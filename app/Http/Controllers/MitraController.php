<?php

namespace App\Http\Controllers;

use App\Exports\TransactionsExport;
use App\Models\Transaction as ModelsTransaction;
use App\Models\User;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class MitraController extends Controller
{
    /**
     * Path for mitra avatar file.
     *
     * @var string
     */
    protected $avatarPath = '/uploads/images/avatars/';

    public function __construct()
    {
        $this->middleware('permission:user view')->only('index', 'show');
        $this->middleware('permission:user create')->only('create', 'store');
        $this->middleware('permission:user edit')->only('edit', 'update');
        $this->middleware('permission:user delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::with('roles:id,name')->where('type', 'store');

            return DataTables::of($users)
                ->addColumn('role', function ($row) {
                    return $row->getRoleNames()->toArray() !== [] ? $row->getRoleNames()[0] : '-';
                })
                ->addColumn('avatar', function ($row) {
                    if ($row->avatar == null) {
                        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($row->email))) . '&s=500';
                    }
                    return asset($this->avatarPath . $row->avatar);
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Aktif';
                    }
                    return 'Tidak Aktif';
                })

                ->addColumn('action', 'mitra.include.action')
                ->toJson();
        }

        return view('mitra.index');
    }

    public function show($id)
    {
        $store = User::where('id', $id)->get();

        $histories = Transaction::where('payable_id', $id)->orderBy('created_at', 'DESC')->paginate(6);
        // $histories = Transaction::where('payable_id', $id)->orderBy('id', 'DESC')->get();
        $totalHistoryIn = Transaction::where('payable_id', $id)->where('type', 'deposit')->sum('amount');
        $totalHistoryOut = Transaction::where('payable_id', $id)->where('type', 'withdraw')->sum('amount');

        return view('mitra.show', compact('store', 'histories', 'totalHistoryIn', 'totalHistoryOut'));
    }

    public function export()
    {
        return Excel::download(new TransactionsExport, 'transactions.xlsx');
    }
}
