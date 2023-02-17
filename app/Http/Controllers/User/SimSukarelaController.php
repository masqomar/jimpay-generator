<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSaving;
use App\Models\UserTopup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimSukarelaController extends Controller
{
    public function index()
    {
        $anggotaID = Auth::user()->id;
        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)->where('user_id', $anggotaID)->sum('amount');
        $totalTopUpSukarela = UserTopup::where('user_id', $anggotaID)->where('note', 'Saldo Sukarela')->sum('amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTopUpSukarela;


        return view('user.sim-sukarela.index', compact('saldoSukarela', 'anggotaID', 'totalSimpananSukarela', 'totalTopUpSukarela'));
    }

    public function show($id)
    {
        $anggotaID = Auth::user()->id;
        $simpananSukarela = UserSaving::where('kop_product_id', 3)->where('user_id', $anggotaID)->paginate(6);

        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)->where('user_id', $anggotaID)->sum('amount');
        $totalTopUpSukarela = UserTopup::where('user_id', $anggotaID)->where('note', 'Saldo Sukarela')->sum('amount');
        $saldoSukarela = $totalSimpananSukarela - $totalTopUpSukarela;

        return view('user.sim-sukarela.show', compact('simpananSukarela', 'anggotaID', 'totalSimpananSukarela', 'totalTopUpSukarela', 'saldoSukarela'));
    }
}
