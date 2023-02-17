<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Http\Requests\{StorePeriodRequest, UpdatePeriodRequest};
use Yajra\DataTables\Facades\DataTables;

class PeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:period view')->only('index', 'show');
        $this->middleware('permission:period create')->only('create', 'store');
        $this->middleware('permission:period edit')->only('edit', 'update');
        $this->middleware('permission:period delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $periods = Period::query();

            return DataTables::of($periods)
                ->addColumn('action', 'periods.include.action')
                ->toJson();
        }

        return view('periods.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeriodRequest $request)
    {
        
        Period::create($request->validated());

        return redirect()
            ->route('periods.index')
            ->with('success', __('The period was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        return view('periods.show', compact('period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit(Period $period)
    {
        return view('periods.edit', compact('period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeriodRequest $request, Period $period)
    {
        
        $period->update($request->validated());

        return redirect()
            ->route('periods.index')
            ->with('success', __('The period was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy(Period $period)
    {
        try {
            $period->delete();

            return redirect()
                ->route('periods.index')
                ->with('success', __('The period was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('periods.index')
                ->with('error', __("The period can't be deleted because it's related to another table."));
        }
    }
}
