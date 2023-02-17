<?php

namespace App\Http\Controllers;

use App\Models\Deviden;
use App\Http\Requests\{StoreDevidenRequest, UpdateDevidenRequest};
use Yajra\DataTables\Facades\DataTables;

class DevidenController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:deviden view')->only('index', 'show');
        $this->middleware('permission:deviden create')->only('create', 'store');
        $this->middleware('permission:deviden edit')->only('edit', 'update');
        $this->middleware('permission:deviden delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $devidens = Deviden::query();

            return DataTables::of($devidens)
                ->addColumn('action', 'devidens.include.action')
                ->toJson();
        }

        return view('devidens.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devidens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDevidenRequest $request)
    {
        
        Deviden::create($request->validated());

        return redirect()
            ->route('devidens.index')
            ->with('success', __('The deviden was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deviden  $deviden
     * @return \Illuminate\Http\Response
     */
    public function show(Deviden $deviden)
    {
        return view('devidens.show', compact('deviden'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deviden  $deviden
     * @return \Illuminate\Http\Response
     */
    public function edit(Deviden $deviden)
    {
        return view('devidens.edit', compact('deviden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deviden  $deviden
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevidenRequest $request, Deviden $deviden)
    {
        
        $deviden->update($request->validated());

        return redirect()
            ->route('devidens.index')
            ->with('success', __('The deviden was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deviden  $deviden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deviden $deviden)
    {
        try {
            $deviden->delete();

            return redirect()
                ->route('devidens.index')
                ->with('success', __('The deviden was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('devidens.index')
                ->with('error', __("The deviden can't be deleted because it's related to another table."));
        }
    }
}
