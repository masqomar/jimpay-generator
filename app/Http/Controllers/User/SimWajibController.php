<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimWajibController extends Controller
{
    public function index()
    {
        $anggotaID = Auth::user()->id;
        $simpananWajib = Simpanan::where('jenis_id', 41)
            ->where('anggota_id', $anggotaID)
            ->paginate(6);

        $totalSimpananWajib = Simpanan::where('jenis_id', 41)
            ->where('anggota_id', $anggotaID)
            ->sum('jumlah');

        return view('user.sim-wajib.index', compact('simpananWajib', 'anggotaID', 'totalSimpananWajib'));
    }
}
