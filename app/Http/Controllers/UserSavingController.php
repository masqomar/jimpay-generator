<?php

namespace App\Http\Controllers;

use App\Models\UserSaving;
use App\Http\Requests\{StoreUserSavingRequest, UpdateUserSavingRequest};
use Yajra\DataTables\Facades\DataTables;

class UserSavingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user saving view')->only('index', 'show');
        $this->middleware('permission:user saving create')->only('create', 'store');
        $this->middleware('permission:user saving edit')->only('edit', 'update');
        $this->middleware('permission:user saving delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $userSavings = UserSaving::with('user:id,first_name', 'kop_product:id', 'period:id,name');

            return DataTables::of($userSavings)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(100);
                })
				->addColumn('user', function ($row) {
                    return $row->user ? $row->user->first_name : '';
                })->addColumn('kop_product', function ($row) {
                    return $row->kop_product ? $row->kop_product->id : '';
                })->addColumn('period', function ($row) {
                    return $row->period ? $row->period->name : '';
                })->addColumn('action', 'user-savings.include.action')
                ->toJson();
        }

        return view('user-savings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-savings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserSavingRequest $request)
    {
        $attr = $request->validated();
		$attr['month'] = $request->month ? \Carbon\Carbon::createFromFormat('Y-m', $request->month)->toDateTimeString() : null;

        UserSaving::create($attr);

        return redirect()
            ->route('user-savings.index')
            ->with('success', __('The userSaving was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function show(UserSaving $userSaving)
    {
        $userSaving->load('user:id,first_name', 'kop_product:id', 'period:id,name');

		return view('user-savings.show', compact('userSaving'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSaving $userSaving)
    {
        $userSaving->load('user:id,first_name', 'kop_product:id', 'period:id,name');

		return view('user-savings.edit', compact('userSaving'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserSavingRequest $request, UserSaving $userSaving)
    {
        $attr = $request->validated();
		$attr['month'] = $request->month ? \Carbon\Carbon::createFromFormat('Y-m', $request->month)->toDateTimeString() : null;

        $userSaving->update($attr);

        return redirect()
            ->route('user-savings.index')
            ->with('success', __('The userSaving was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSaving  $userSaving
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSaving $userSaving)
    {
        try {
            $userSaving->delete();

            return redirect()
                ->route('user-savings.index')
                ->with('success', __('The userSaving was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('user-savings.index')
                ->with('error', __("The userSaving can't be deleted because it's related to another table."));
        }
    }
}
