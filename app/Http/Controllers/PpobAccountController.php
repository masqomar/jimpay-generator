<?php

namespace App\Http\Controllers;

use App\Models\PpobAccount;
use App\Http\Requests\{StorePpobAccountRequest, UpdatePpobAccountRequest};
use Yajra\DataTables\Facades\DataTables;

class PpobAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ppob account view')->only('index', 'show');
        $this->middleware('permission:ppob account create')->only('create', 'store');
        $this->middleware('permission:ppob account edit')->only('edit', 'update');
        $this->middleware('permission:ppob account delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $ppobAccounts = PpobAccount::query();

            return DataTables::of($ppobAccounts)
                ->addColumn('action', 'ppob-accounts.include.action')
                ->toJson();
        }

        return view('ppob-accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppob-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePpobAccountRequest $request)
    {
        
        PpobAccount::create($request->validated());

        return redirect()
            ->route('ppob-accounts.index')
            ->with('success', __('The ppobAccount was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PpobAccount  $ppobAccount
     * @return \Illuminate\Http\Response
     */
    public function show(PpobAccount $ppobAccount)
    {
        return view('ppob-accounts.show', compact('ppobAccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PpobAccount  $ppobAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(PpobAccount $ppobAccount)
    {
        return view('ppob-accounts.edit', compact('ppobAccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PpobAccount  $ppobAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePpobAccountRequest $request, PpobAccount $ppobAccount)
    {
        
        $ppobAccount->update($request->validated());

        return redirect()
            ->route('ppob-accounts.index')
            ->with('success', __('The ppobAccount was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PpobAccount  $ppobAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PpobAccount $ppobAccount)
    {
        try {
            $ppobAccount->delete();

            return redirect()
                ->route('ppob-accounts.index')
                ->with('success', __('The ppobAccount was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('ppob-accounts.index')
                ->with('error', __("The ppobAccount can't be deleted because it's related to another table."));
        }
    }
}
