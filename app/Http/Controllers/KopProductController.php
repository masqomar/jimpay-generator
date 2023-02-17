<?php

namespace App\Http\Controllers;

use App\Models\KopProduct;
use App\Http\Requests\{StoreKopProductRequest, UpdateKopProductRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class KopProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:kop product view')->only('index', 'show');
        $this->middleware('permission:kop product create')->only('create', 'store');
        $this->middleware('permission:kop product edit')->only('edit', 'update');
        $this->middleware('permission:kop product delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $kopProducts = KopProduct::with('kop_product_type:id,name');

            return Datatables::of($kopProducts)
                ->addColumn('kop_product_type', function ($row) {
                    return $row->kop_product_type ? $row->kop_product_type->name : '';
                })
                ->addColumn('cover', function ($row) {
                    if ($row->cover == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/covers/' . $row->cover);
                })

                ->addColumn('action', 'kop-products.include.action')
                ->toJson();
        }

        return view('kop-products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kop-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKopProductRequest $request)
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

        KopProduct::create($attr);

        return redirect()
            ->route('kop-products.index')
            ->with('success', __('The kopProduct was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function show(KopProduct $kopProduct)
    {
        $kopProduct->load('kop_product_type:id,name');

		return view('kop-products.show', compact('kopProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(KopProduct $kopProduct)
    {
        $kopProduct->load('kop_product_type:id,name');

		return view('kop-products.edit', compact('kopProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKopProductRequest $request, KopProduct $kopProduct)
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
            if ($kopProduct->cover != null && file_exists($path . $kopProduct->cover)) {
                unlink($path . $kopProduct->cover);
            }

            $attr['cover'] = $filename;
        }

        $kopProduct->update($attr);

        return redirect()
            ->route('kop-products.index')
            ->with('success', __('The kopProduct was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(KopProduct $kopProduct)
    {
        try {
            $path = storage_path('app/public/uploads/covers/');

            if ($kopProduct->cover != null && file_exists($path . $kopProduct->cover)) {
                unlink($path . $kopProduct->cover);
            }

            $kopProduct->delete();

            return redirect()
                ->route('kop-products.index')
                ->with('success', __('The kopProduct was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('kop-products.index')
                ->with('error', __("The kopProduct can't be deleted because it's related to another table."));
        }
    }
}
