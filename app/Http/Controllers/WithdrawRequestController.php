<?php

namespace App\Http\Controllers;

use App\Models\WithdrawRequest;
use App\Http\Requests\{StoreWithdrawRequestRequest, UpdateWithdrawRequestRequest};
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Image;

class WithdrawRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:withdraw request view')->only('index', 'show');
        $this->middleware('permission:withdraw request create')->only('create', 'store');
        $this->middleware('permission:withdraw request edit')->only('edit', 'update');
        $this->middleware('permission:withdraw request delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $withdrawRequests = WithdrawRequest::with('user:id,first_name', 'bank');

            return Datatables::of($withdrawRequests)
                ->addColumn('extra_field', function ($row) {
                    return str($row->extra_field)->limit(100);
                })
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->first_name : '';
                })
                ->addColumn('bank', function ($row) {
                    return $row->bank ? $row->bank->name : '';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }
                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'withdraw-requests.include.action')
                ->toJson();
        }

        return view('withdraw-requests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('withdraw-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWithdrawRequestRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            $attr['image'] = $filename;
        }

        $user = User::where('id', $request->user_id)->first();
        $pengguna = $user->withdraw($request->amount, ['description' => 'Pencairan Saldo Penjualan']);

        WithdrawRequest::create($attr);


        return redirect()
            ->route('withdraw-requests.index')
            ->with('success', __('The withdrawRequest was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawRequest $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawRequest $withdrawRequest)
    {
        $withdrawRequest->load('user:id,first_name');

        return view('withdraw-requests.show', compact('withdrawRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WithdrawRequest $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(WithdrawRequest $withdrawRequest)
    {
        $withdrawRequest->load('user:id,first_name');

        return view('withdraw-requests.edit', compact('withdrawRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawRequest $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWithdrawRequestRequest $request, WithdrawRequest $withdrawRequest)
    {
        $attr = $request->validated();

        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old image from storage
            if ($withdrawRequest->image != null && file_exists($path . $withdrawRequest->image)) {
                unlink($path . $withdrawRequest->image);
            }

            $attr['image'] = $filename;
        }

        $user = User::where('id', $request->user_id)->first();
        $pengguna = $user->withdraw($request->amount, ['description' => 'Pencairan Saldo Penjualan']);

        $withdrawRequest->update($attr);

        return redirect()
            ->route('withdraw-requests.index')
            ->with('success', __('The withdrawRequest was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawRequest $withdrawRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawRequest $withdrawRequest)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($withdrawRequest->image != null && file_exists($path . $withdrawRequest->image)) {
                unlink($path . $withdrawRequest->image);
            }

            $withdrawRequest->delete();

            return redirect()
                ->route('withdraw-requests.index')
                ->with('success', __('The withdrawRequest was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('withdraw-requests.index')
                ->with('error', __("The withdrawRequest can't be deleted because it's related to another table."));
        }
    }
}
