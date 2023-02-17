<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Models\Deviden;
use App\Models\User;
use App\Models\UserSaving;
use Illuminate\Http\Request;

class ShuController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:deviden view')->only('index', 'show');
    }

    public function index()
    {
        $totalAnggota = User::where('type', 'user')->count();
        $totalAnggotaAktif = User::where('type', 'user')->where('status', 1)->count();
        $totalAnggotaNonAktif = User::where('type', 'user')->where('status', 0)->count();

        $simpananPokok = UserSaving::where('kop_product_id', 1)->sum('amount');
        $simpananWajib = UserSaving::where('kop_product_id', 2)->sum('amount');
        $simpananSukarela = UserSaving::where('kop_product_id', 3)->sum('amount');
        $totalSimpananAnggota = $simpananPokok + $simpananWajib + $simpananSukarela;

        $kasMasuk = Cashflow::where('type', 'Masuk')->sum('amount');
        $kasKeluar = Cashflow::where('type', 'Keluar')->sum('amount');
        $sisaKas = $kasMasuk - $kasKeluar;

        // $pembagianShu = Deviden::get();
        // foreach ($pembagianShu as $bagiBagiShu)
        //     $cadangan = $bagiBagiShu->operational_reserve;
        // $modal = $bagiBagiShu->capital;
        // $modalAnggota = $bagiBagiShu->user_capital;
        // $aktifitasAnggota = $bagiBagiShu->user_activity;
        // $pengurus = $bagiBagiShu->management;

        // $shuCadangan = $sisaKas * $cadangan / 100;
        // $shuModal = $sisaKas * $modal / 100;
        // $shuModalAnggota = $sisaKas * $modalAnggota / 100;
        // $shuAktifitasAnggota = $sisaKas * $aktifitasAnggota / 100;
        // $shuPengurus = $sisaKas * $pengurus / 100;
        // $totalShu = $shuCadangan + $shuModal + $shuModalAnggota + $shuAktifitasAnggota + $shuPengurus;

        // dd($totalShu);
        return view('shu.index', compact('totalAnggota', 'totalAnggotaAktif', 'totalAnggotaNonAktif', 'simpananPokok', 'simpananWajib', 'simpananSukarela', 'totalSimpananAnggota', 'kasMasuk', 'kasKeluar', 'sisaKas'));
    }
}
