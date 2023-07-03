<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePembiayaanRequest;
use App\Models\Bank;
use App\Models\Paylater;
use App\Models\PaylaterProvider;
use App\Models\Pinjaman;
use App\Models\PinjamanDetail;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembiayaanController extends Controller
{
    public function index()
    {
        $anggotaID = Auth::user()->id;
        $pembiayaanAll = Pinjaman::where('anggota_id', $anggotaID)->paginate(5);

        return view('user.pembiayaan.index', compact('anggotaID', 'pembiayaanAll'));
    }

    public function show($id)
    {
        $pinjamanDetail = PinjamanDetail::with('pinjaman')->where('pinjam_id', $id)->get();
        $totalAngsuran = PinjamanDetail::where('pinjam_id', $id)->sum('jumlah_bayar');
        
        return view('user.pembiayaan.show', compact('pinjamanDetail', 'totalAngsuran'));
    }

    // public function index()
    // {
    //     $terms = Term::where('title', 'pembiayaan')->get();

    //     return view('user.pembiayaan.index', compact('terms'));
    // }

    // public function store(StorePembiayaanRequest $request)
    // {
    //     Paylater::create($request->validated() + ['user_id' => Auth::user()->id, 'paylater_provider_id' => 1, 'bank_id' => 1, 'status' => 0]);

    //     return redirect()->route('user.paylater.index')
    //         ->with('success', 'Pengajuan pembiayaan kamu sedang diproses. Silahkan tunggu konfirmasi dari admin');
    // }
}
