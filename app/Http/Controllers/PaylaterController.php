<?php

namespace App\Http\Controllers;

use App\Models\Paylater;
use App\Http\Requests\{StoreBayarAngsuranRequest, StorePaylaterRequest, UpdatePaylaterRequest};
use App\Models\PaylaterTransaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Image;

class PaylaterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:paylater view')->only('index', 'show');
        $this->middleware('permission:paylater create')->only('create', 'store');
        $this->middleware('permission:paylater edit')->only('edit', 'update');
        $this->middleware('permission:paylater delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $paylaters = Paylater::with('user', 'paylater_provider:id,name', 'bank:id,code');

            return Datatables::of($paylaters)
                ->addColumn('note', function ($row) {
                    return str($row->note)->limit(100);
                })
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->first_name . ' -' . $row->user->member_id : '';
                })->addColumn('paylater_provider', function ($row) {
                    return $row->paylater_provider ? $row->paylater_provider->name : '';
                })->addColumn('bank', function ($row) {
                    return $row->bank ? $row->bank->code : '';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }
                    return asset('storage/uploads/images/' . $row->image);
                })
                ->addColumn('totalAngsuran', function ($row) {
                    $totalAngsuran = PaylaterTransaction::where('paylater_id', $row->id)->sum('amount');
                    return 'Rp. ' . number_format($totalAngsuran);
                })
                ->addColumn('kurangan', function ($row) {
                    $totalAngsuran = PaylaterTransaction::where('paylater_id', $row->id)->sum('amount');
                    if ($row->amount == $totalAngsuran) {
                        return 'Lunas';
                    } elseif ($row->amount <= $totalAngsuran) {
                        return 'Kelebihan';
                    }
                    return 'Belum Lunas';
                })
                ->addColumn('action', 'paylaters.include.action')
                ->toJson();
        }

        return view('paylaters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paylaters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaylaterRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            $attr['image'] = $filename;
        }

        Paylater::create($attr);

        return redirect()
            ->route('paylaters.index')
            ->with('success', __('The paylater was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function show(Paylater $paylater)
    {
        $paylater->load('user:id,first_name,member_id', 'paylater_provider:id,name', 'bank:id,code');
        $paylaterTransactions = PaylaterTransaction::where('paylater_id', $paylater->id)->get();
        $nominamPaylater = $paylater->amount;
        $totalAngsuran = PaylaterTransaction::where('paylater_id', $paylater->id)->sum('amount');

        $kurangBayar = $nominamPaylater - $totalAngsuran;

        return view('paylaters.show', compact('paylater', 'paylaterTransactions', 'totalAngsuran', 'kurangBayar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function edit(Paylater $paylater)
    {
        $paylater->load('user:id,first_name', 'paylater_provider:id,name', 'bank:id,code');

        return view('paylaters.edit', compact('paylater'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaylaterRequest $request, Paylater $paylater)
    {
        $attr = $request->validated();

        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old image from storage
            if ($paylater->image != null && file_exists($path . $paylater->image)) {
                unlink($path . $paylater->image);
            }

            $attr['image'] = $filename;
        }

        $paylater->update($attr);

        return redirect()
            ->route('paylaters.index')
            ->with('success', __('The paylater was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paylater $paylater)
    {
        //
    }

    public function bayar($id)
    {
        $paylaters = Paylater::with('user')->where('id', $id)->get();

        // return json_decode($paylaters);
        return view('paylaters.bayar', compact('paylaters'));
    }

    public function bayarAngsuran(StoreBayarAngsuranRequest $request)
    {
        // dd($request->all());
        PaylaterTransaction::create($request->validated());

        return redirect()
            ->route('paylaters.index')
            ->with('success', __('Berhasil menambah data angsuran.'));
    }
}
