<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimSukarelaController extends Controller
{
    public function index()
    {
        $anggotaID = Auth::user()->id;
        $simpananSukarela = Simpanan::where('jenis_id', 32)
            ->where('anggota_id', $anggotaID)
            ->paginate(6);

        $setoranSimpananSukarela = Simpanan::where('jenis_id', 32)
            ->where('anggota_id', $anggotaID)
            ->where('akun', 'setoran')
            ->sum('jumlah');
        $penarikanSimpananSukarela = Simpanan::where('jenis_id', 32)
            ->where('anggota_id', $anggotaID)
            ->where('akun', 'penarikan')
            ->sum('jumlah');

        $totalSimpananSukarela = $setoranSimpananSukarela - $penarikanSimpananSukarela;

        return view('user.sim-sukarela.index', compact('simpananSukarela', 'anggotaID', 'totalSimpananSukarela', 'setoranSimpananSukarela', 'penarikanSimpananSukarela'));
    }

    public function show()
    {
        $anggotaID = Auth::user()->id;
        $detailPenarikanSukarela = Simpanan::where('anggota_id', $anggotaID)
            ->where('jenis_id', 32)
            ->where('akun', 'penarikan')
            ->get();
        $totalPenarikanSukarela = Simpanan::where('anggota_id', $anggotaID)
            ->where('jenis_id', 32)
            ->where('akun', 'penarikan')
            ->sum('jumlah');

        return view('user.sim-sukarela.show', compact('anggotaID', 'detailPenarikanSukarela', 'totalPenarikanSukarela'));
    }
}
