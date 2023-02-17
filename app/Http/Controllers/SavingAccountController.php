<?php

namespace App\Http\Controllers;

use App\Models\SavingAccount;
use App\Http\Requests\{StoreSavingAccountRequest, UpdateSavingAccountRequest};
use Yajra\DataTables\Facades\DataTables;

class SavingAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:saving account view')->only('index', 'show');
        $this->middleware('permission:saving account create')->only('create', 'store');
        $this->middleware('permission:saving account edit')->only('edit', 'update');
        $this->middleware('permission:saving account delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $savingAccounts = SavingAccount::with('saving_account_type:id,code');

            return DataTables::of($savingAccounts)
                ->addColumn('saving_account_type', function ($row) {
                    return $row->saving_account_type ? $row->saving_account_type->code : '';
                })->addColumn('action', 'saving-accounts.include.action')
                ->toJson();
        }

        return view('saving-accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saving-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavingAccountRequest $request)
    {
        
        SavingAccount::create($request->validated());

        return redirect()
            ->route('saving-accounts.index')
            ->with('success', __('The savingAccount was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function show(SavingAccount $savingAccount)
    {
        $savingAccount->load('saving_account_type:id,code');

		return view('saving-accounts.show', compact('savingAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingAccount $savingAccount)
    {
        $savingAccount->load('saving_account_type:id,code');

		return view('saving-accounts.edit', compact('savingAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSavingAccountRequest $request, SavingAccount $savingAccount)
    {
        
        $savingAccount->update($request->validated());

        return redirect()
            ->route('saving-accounts.index')
            ->with('success', __('The savingAccount was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingAccount $savingAccount)
    {
        try {
            $savingAccount->delete();

            return redirect()
                ->route('saving-accounts.index')
                ->with('success', __('The savingAccount was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('saving-accounts.index')
                ->with('error', __("The savingAccount can't be deleted because it's related to another table."));
        }
    }
}
