<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePengajuanPaylaterRequest;
use App\Models\Bank;
use App\Models\Paylater;
use App\Models\PaylaterProvider;
use App\Models\PaylaterTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaylaterController extends Controller
{
    public function index()
    {
        $anggotaID = Auth::user()->id;
        $paylaterAll = Paylater::with('paylater_provider')->where('user_id', $anggotaID)->get();

        return view('user.paylater.index', compact('anggotaID', 'paylaterAll'));
    }

    public function create()
    {
        $paylaterProviders = PaylaterProvider::all();
        $banks = Bank::all();

        return view('user.paylater.create', compact('paylaterProviders', 'banks'));
    }

    public function store(StorePengajuanPaylaterRequest $request)
    {
        // dd($request->all());
        Paylater::create($request->validated() + ['user_id' => Auth::user()->id, 'status' => 0]);

        return redirect()->route('user.paylater.index')
            ->with('success', 'Pengajuan paylater kamu sedang diproses');
    }

    public function show($id)
    {
        $paylaterDetails = PaylaterTransaction::where('paylater_id', $id)->get();
        $totalAngsuran = PaylaterTransaction::where('paylater_id', $id)->sum('amount');
        $nominalPaylater = Paylater::select('amount')->where('id', $id)->get()->first()->amount;

        $kurangBayar = $nominalPaylater - $totalAngsuran;

        return view('user.paylater.show', compact('paylaterDetails', 'totalAngsuran', 'nominalPaylater', 'kurangBayar'));
    }
}
