<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Http\Requests\{StoreCashflowRequest, UpdateCashflowRequest};
use App\Imports\ImportCashflow;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Image;
use Maatwebsite\Excel\Facades\Excel;

class CashflowController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:cashflow view')->only('index', 'show');
        $this->middleware('permission:cashflow create')->only('create', 'store');
        $this->middleware('permission:cashflow edit')->only('edit', 'update');
        $this->middleware('permission:cashflow delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $cashflows = Cashflow::with('saving_account:id,name');

            return Datatables::of($cashflows)
                ->addColumn('description', function ($row) {
                    return str($row->description)->limit(100);
                })
                ->addColumn('saving_account', function ($row) {
                    return $row->saving_account ? $row->saving_account->name : '';
                })
                ->addColumn('cashflow_image', function ($row) {
                    if ($row->cashflow_image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }
                    return asset('storage/uploads/cashflow-images/' . $row->cashflow_image);
                })

                ->addColumn('action', 'cashflows.include.action')
                ->toJson();
        }

        return view('cashflows.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cashflows.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashflowRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('cashflow_image') && $request->file('cashflow_image')->isValid()) {

            $path = storage_path('app/public/uploads/cashflow_images/');
            $filename = $request->file('cashflow_image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('cashflow_image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            $attr['cashflow_image'] = $filename;
        }

        Cashflow::create($attr);

        return redirect()
            ->route('cashflows.index')
            ->with('success', __('The cashflow was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cashflow $cashflow
     * @return \Illuminate\Http\Response
     */
    public function show(Cashflow $cashflow)
    {
        $cashflow->load('saving_account:id,saving_account_type_id');

        return view('cashflows.show', compact('cashflow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cashflow $cashflow
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashflow $cashflow)
    {
        $cashflow->load('saving_account:id,saving_account_type_id');

        return view('cashflows.edit', compact('cashflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cashflow $cashflow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashflowRequest $request, Cashflow $cashflow)
    {
        $attr = $request->validated();

        if ($request->file('cashflow_image') && $request->file('cashflow_image')->isValid()) {

            $path = storage_path('app/public/uploads/cashflow_images/');
            $filename = $request->file('cashflow_image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('cashflow_image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old cashflow_image from storage
            if ($cashflow->cashflow_image != null && file_exists($path . $cashflow->cashflow_image)) {
                unlink($path . $cashflow->cashflow_image);
            }

            $attr['cashflow_image'] = $filename;
        }

        $cashflow->update($attr);

        return redirect()
            ->route('cashflows.index')
            ->with('success', __('The cashflow was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cashflow $cashflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashflow $cashflow)
    {
        try {
            $path = storage_path('app/public/uploads/cashflow_images/');

            if ($cashflow->cashflow_image != null && file_exists($path . $cashflow->cashflow_image)) {
                unlink($path . $cashflow->cashflow_image);
            }

            $cashflow->delete();

            return redirect()
                ->route('cashflows.index')
                ->with('success', __('The cashflow was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('cashflows.index')
                ->with('error', __("The cashflow can't be deleted because it's related to another table."));
        }
    }

    public function import(Request $request)
    {
        Excel::import(new ImportCashflow, $request->file('file')->store('files'));
        return redirect()->back();
    }
}
