<?php

namespace App\Http\Controllers;

use App\Models\CashflowTransaction;
use App\Http\Requests\{StoreCashflowTransactionRequest, UpdateCashflowTransactionRequest};
use Yajra\DataTables\Facades\DataTables;

class CashflowTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:cashflow transaction view')->only('index', 'show');
        $this->middleware('permission:cashflow transaction create')->only('create', 'store');
        $this->middleware('permission:cashflow transaction edit')->only('edit', 'update');
        $this->middleware('permission:cashflow transaction delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $cashflowTransactions = CashflowTransaction::with('cashflow:id,saving_account_id', 'bank:id,code');

            return DataTables::of($cashflowTransactions)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(100);
                })
				->addColumn('cashflow', function ($row) {
                    return $row->cashflow ? $row->cashflow->saving_account_id : '';
                })->addColumn('bank', function ($row) {
                    return $row->bank ? $row->bank->code : '';
                })->addColumn('action', 'cashflow-transactions.include.action')
                ->toJson();
        }

        return view('cashflow-transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cashflow-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashflowTransactionRequest $request)
    {
        
        CashflowTransaction::create($request->validated());

        return redirect()
            ->route('cashflow-transactions.index')
            ->with('success', __('The cashflowTransaction was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashflowTransaction  $cashflowTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(CashflowTransaction $cashflowTransaction)
    {
        $cashflowTransaction->load('cashflow:id,saving_account_id', 'bank:id,code');

		return view('cashflow-transactions.show', compact('cashflowTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashflowTransaction  $cashflowTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(CashflowTransaction $cashflowTransaction)
    {
        $cashflowTransaction->load('cashflow:id,saving_account_id', 'bank:id,code');

		return view('cashflow-transactions.edit', compact('cashflowTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashflowTransaction  $cashflowTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashflowTransactionRequest $request, CashflowTransaction $cashflowTransaction)
    {
        
        $cashflowTransaction->update($request->validated());

        return redirect()
            ->route('cashflow-transactions.index')
            ->with('success', __('The cashflowTransaction was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashflowTransaction  $cashflowTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashflowTransaction $cashflowTransaction)
    {
        try {
            $cashflowTransaction->delete();

            return redirect()
                ->route('cashflow-transactions.index')
                ->with('success', __('The cashflowTransaction was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('cashflow-transactions.index')
                ->with('error', __("The cashflowTransaction can't be deleted because it's related to another table."));
        }
    }
}
