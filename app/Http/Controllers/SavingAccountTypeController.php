<?php

namespace App\Http\Controllers;

use App\Models\SavingAccountType;
use App\Http\Requests\{StoreSavingAccountTypeRequest, UpdateSavingAccountTypeRequest};
use Yajra\DataTables\Facades\DataTables;

class SavingAccountTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:saving account type view')->only('index', 'show');
        $this->middleware('permission:saving account type create')->only('create', 'store');
        $this->middleware('permission:saving account type edit')->only('edit', 'update');
        $this->middleware('permission:saving account type delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $savingAccountTypes = SavingAccountType::query();

            return DataTables::of($savingAccountTypes)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(100);
                })
				->addColumn('action', 'saving-account-types.include.action')
                ->toJson();
        }

        return view('saving-account-types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saving-account-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavingAccountTypeRequest $request)
    {
        
        SavingAccountType::create($request->validated());

        return redirect()
            ->route('saving-account-types.index')
            ->with('success', __('The savingAccountType was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingAccountType  $savingAccountType
     * @return \Illuminate\Http\Response
     */
    public function show(SavingAccountType $savingAccountType)
    {
        return view('saving-account-types.show', compact('savingAccountType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingAccountType  $savingAccountType
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingAccountType $savingAccountType)
    {
        return view('saving-account-types.edit', compact('savingAccountType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingAccountType  $savingAccountType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSavingAccountTypeRequest $request, SavingAccountType $savingAccountType)
    {
        
        $savingAccountType->update($request->validated());

        return redirect()
            ->route('saving-account-types.index')
            ->with('success', __('The savingAccountType was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingAccountType  $savingAccountType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingAccountType $savingAccountType)
    {
        try {
            $savingAccountType->delete();

            return redirect()
                ->route('saving-account-types.index')
                ->with('success', __('The savingAccountType was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('saving-account-types.index')
                ->with('error', __("The savingAccountType can't be deleted because it's related to another table."));
        }
    }
}
