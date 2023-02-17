<?php

namespace App\Http\Controllers;

use App\Models\KopProductType;
use App\Http\Requests\{StoreKopProductTypeRequest, UpdateKopProductTypeRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class KopProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kop product type view')->only('index', 'show');
        $this->middleware('permission:kop product type create')->only('create', 'store');
        $this->middleware('permission:kop product type edit')->only('edit', 'update');
        $this->middleware('permission:kop product type delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $kopProductTypes = KopProductType::query();

            return Datatables::of($kopProductTypes)
                
                ->addColumn('cover', function ($row) {
                    if ($row->cover == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/covers/' . $row->cover);
                })

                ->addColumn('action', 'kop-product-types.include.action')
                ->toJson();
        }

        return view('kop-product-types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kop-product-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKopProductTypeRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('cover') && $request->file('cover')->isValid()) {

            $path = storage_path('app/public/uploads/covers/');
            $filename = $request->file('cover')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('cover')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['cover'] = $filename;
        }

        KopProductType::create($attr);

        return redirect()
            ->route('kop-product-types.index')
            ->with('success', __('The kopProductType was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KopProductType $kopProductType
     * @return \Illuminate\Http\Response
     */
    public function show(KopProductType $kopProductType)
    {
        return view('kop-product-types.show', compact('kopProductType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KopProductType $kopProductType
     * @return \Illuminate\Http\Response
     */
    public function edit(KopProductType $kopProductType)
    {
        return view('kop-product-types.edit', compact('kopProductType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KopProductType $kopProductType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKopProductTypeRequest $request, KopProductType $kopProductType)
    {
        $attr = $request->validated();
        
        if ($request->file('cover') && $request->file('cover')->isValid()) {

            $path = storage_path('app/public/uploads/covers/');
            $filename = $request->file('cover')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('cover')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old cover from storage
            if ($kopProductType->cover != null && file_exists($path . $kopProductType->cover)) {
                unlink($path . $kopProductType->cover);
            }

            $attr['cover'] = $filename;
        }

        $kopProductType->update($attr);

        return redirect()
            ->route('kop-product-types.index')
            ->with('success', __('The kopProductType was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KopProductType $kopProductType
     * @return \Illuminate\Http\Response
     */
    public function destroy(KopProductType $kopProductType)
    {
        try {
            $path = storage_path('app/public/uploads/covers/');

            if ($kopProductType->cover != null && file_exists($path . $kopProductType->cover)) {
                unlink($path . $kopProductType->cover);
            }

            $kopProductType->delete();

            return redirect()
                ->route('kop-product-types.index')
                ->with('success', __('The kopProductType was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('kop-product-types.index')
                ->with('error', __("The kopProductType can't be deleted because it's related to another table."));
        }
    }
}
