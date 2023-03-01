<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePembiayaanRequest;
use App\Models\Bank;
use App\Models\Paylater;
use App\Models\PaylaterProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembiayaanController extends Controller
{
    public function index()
    {

        return view('user.pembiayaan.index');
    }

    public function store(StorePembiayaanRequest $request)
    {
        Paylater::create($request->validated() + ['user_id' => Auth::user()->id, 'paylater_provider_id' => 1, 'bank_id' => 1, 'status' => 0]);

        return redirect()->route('user.paylater.index')
            ->with('success', 'Pengajuan pembiayaan kamu sedang diproses. Silahkan tunggu konfirmasi dari admin');
    }
}
