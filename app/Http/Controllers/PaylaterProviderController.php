<?php

namespace App\Http\Controllers;

use App\Models\PaylaterProvider;
use App\Http\Requests\{StorePaylaterProviderRequest, UpdatePaylaterProviderRequest};
use Yajra\DataTables\Facades\DataTables;

class PaylaterProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:paylater provider view')->only('index', 'show');
        $this->middleware('permission:paylater provider create')->only('create', 'store');
        $this->middleware('permission:paylater provider edit')->only('edit', 'update');
        $this->middleware('permission:paylater provider delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $paylaterProviders = PaylaterProvider::with('kop_product:id,name');

            return DataTables::of($paylaterProviders)
                ->addColumn('kop_product', function ($row) {
                    return $row->kop_product ? $row->kop_product->name : '';
                })->addColumn('action', 'paylater-providers.include.action')
                ->toJson();
        }

        return view('paylater-providers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paylater-providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaylaterProviderRequest $request)
    {
        
        PaylaterProvider::create($request->validated());

        return redirect()
            ->route('paylater-providers.index')
            ->with('success', __('The paylaterProvider was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function show(PaylaterProvider $paylaterProvider)
    {
        $paylaterProvider->load('kop_product:id,name');

		return view('paylater-providers.show', compact('paylaterProvider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(PaylaterProvider $paylaterProvider)
    {
        $paylaterProvider->load('kop_product:id,name');

		return view('paylater-providers.edit', compact('paylaterProvider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaylaterProviderRequest $request, PaylaterProvider $paylaterProvider)
    {
        
        $paylaterProvider->update($request->validated());

        return redirect()
            ->route('paylater-providers.index')
            ->with('success', __('The paylaterProvider was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaylaterProvider $paylaterProvider)
    {
        try {
            $paylaterProvider->delete();

            return redirect()
                ->route('paylater-providers.index')
                ->with('success', __('The paylaterProvider was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('paylater-providers.index')
                ->with('error', __("The paylaterProvider can't be deleted because it's related to another table."));
        }
    }
}
