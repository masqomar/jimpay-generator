<?php

namespace App\Http\Controllers;

use App\Models\UserSavingTransaction;
use App\Http\Requests\{StoreUserSavingTransactionRequest, UpdateUserSavingTransactionRequest};
use App\Models\UserSaving;
use Yajra\DataTables\Facades\DataTables;
use Image;

class UserSavingTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user saving transaction view')->only('index', 'show');
        $this->middleware('permission:user saving transaction create')->only('create', 'store');
        $this->middleware('permission:user saving transaction edit')->only('edit', 'update');
        $this->middleware('permission:user saving transaction delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $userSavingTransactions = UserSavingTransaction::with('user:id,first_name', 'kop_product:id,name');

            return Datatables::of($userSavingTransactions)
                ->addColumn('description', function ($row) {
                    return str($row->description)->limit(100);
                })
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->first_name : '';
                })->addColumn('kop_product', function ($row) {
                    return $row->kop_product ? $row->kop_product->name : '';
                })
                ->addColumn('saving_transaction_image', function ($row) {
                    if ($row->saving_transaction_image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }
                    return asset('storage/uploads/saving-transaction-images/' . $row->saving_transaction_image);
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return 'Sukses';
                    }
                    return 'Diproses';
                })

                ->addColumn('action', 'user-saving-transactions.include.action')
                ->toJson();
        }

        return view('user-saving-transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user-saving-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserSavingTransactionRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('saving_transaction_image') && $request->file('saving_transaction_image')->isValid()) {

            $path = storage_path('app/public/uploads/saving_transaction_images/');
            $filename = $request->file('saving_transaction_image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('saving_transaction_image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            $attr['saving_transaction_image'] = $filename;
        }

        UserSavingTransaction::create($attr);

        return redirect()
            ->route('user-saving-transactions.index')
            ->with('success', __('The userSavingTransaction was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSavingTransaction $userSavingTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(UserSavingTransaction $userSavingTransaction)
    {
        $userSavingTransaction->load('user:id,first_name', 'kop_product:id,name');

        return view('user-saving-transactions.show', compact('userSavingTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSavingTransaction $userSavingTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSavingTransaction $userSavingTransaction)
    {
        $userSavingTransaction->load('user:id,first_name', 'kop_product:id,name');
        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)
            ->where('user_id', $userSavingTransaction->user_id)->sum('amount');
        $totalTransaksiTarik = UserSavingTransaction::where('user_id', $userSavingTransaction->user_id)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->sum('amount');
        $totalTopUpSukarela = UserSavingTransaction::where('user_id', $userSavingTransaction->user_id)
            ->where('description', 'Topup Saldo Jimpay')
            ->where('status', 1)->sum('amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        return view('user-saving-transactions.edit', compact('userSavingTransaction', 'saldoSukarela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSavingTransaction $userSavingTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserSavingTransactionRequest $request, UserSavingTransaction $userSavingTransaction)
    {
        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)
            ->where('user_id', $userSavingTransaction->user_id)->sum('amount');
        $totalTransaksiTarik = UserSavingTransaction::where('user_id', $userSavingTransaction->user_id)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->sum('amount');
        $totalTopUpSukarela = UserSavingTransaction::where('user_id', $userSavingTransaction->user_id)
            ->where('description', 'Topup Saldo Jimpay')
            ->where('status', 1)->sum('amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;
        $nominalPengambilan = $request->amount;

        if ($saldoSukarela >= $nominalPengambilan) {
            $attr = $request->validated();

            if ($request->file('saving_transaction_image') && $request->file('saving_transaction_image')->isValid()) {

                $path = storage_path('app/public/uploads/saving_transaction_images/');
                $filename = $request->file('saving_transaction_image')->hashName();

                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                Image::make($request->file('saving_transaction_image')->getRealPath())->resize(500, 500, function ($constraint) {
                    $constraint->upsize();
                    $constraint->aspectRatio();
                })->save($path . $filename);

                // delete old saving_transaction_image from storage
                if ($userSavingTransaction->saving_transaction_image != null && file_exists($path . $userSavingTransaction->saving_transaction_image)) {
                    unlink($path . $userSavingTransaction->saving_transaction_image);
                }

                $attr['saving_transaction_image'] = $filename;
            }

            $userSavingTransaction->update($attr);

            return redirect()
                ->route('user-saving-transactions.index')
                ->with('success', __('The userSavingTransaction was updated successfully.'));
        }

        return redirect()
            ->route('user-saving-transactions.index')
            ->with('error', __('Nominal pengambilan lebih besar dari saldo simpanan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSavingTransaction $userSavingTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSavingTransaction $userSavingTransaction)
    {
        try {
            $path = storage_path('app/public/uploads/saving_transaction_images/');

            if ($userSavingTransaction->saving_transaction_image != null && file_exists($path . $userSavingTransaction->saving_transaction_image)) {
                unlink($path . $userSavingTransaction->saving_transaction_image);
            }

            $userSavingTransaction->delete();

            return redirect()
                ->route('user-saving-transactions.index')
                ->with('success', __('The userSavingTransaction was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('user-saving-transactions.index')
                ->with('error', __("The userSavingTransaction can't be deleted because it's related to another table."));
        }
    }
}
