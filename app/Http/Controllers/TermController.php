<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Http\Requests\{StoreTermRequest, UpdateTermRequest};
use Yajra\DataTables\Facades\DataTables;

class TermController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:term view')->only('index', 'show');
        $this->middleware('permission:term create')->only('create', 'store');
        $this->middleware('permission:term edit')->only('edit', 'update');
        $this->middleware('permission:term delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $terms = Term::query();

            return DataTables::of($terms)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(100);
                })
				->addColumn('action', 'terms.include.action')
                ->toJson();
        }

        return view('terms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermRequest $request)
    {
        
        Term::create($request->validated());

        return redirect()
            ->route('terms.index')
            ->with('success', __('The term was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
        return view('terms.show', compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function edit(Term $term)
    {
        return view('terms.edit', compact('term'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermRequest $request, Term $term)
    {
        
        $term->update($request->validated());

        return redirect()
            ->route('terms.index')
            ->with('success', __('The term was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Term  $term
     * @return \Illuminate\Http\Response
     */
    public function destroy(Term $term)
    {
        try {
            $term->delete();

            return redirect()
                ->route('terms.index')
                ->with('success', __('The term was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('terms.index')
                ->with('error', __("The term can't be deleted because it's related to another table."));
        }
    }
}
