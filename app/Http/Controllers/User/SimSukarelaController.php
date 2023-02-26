<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSaving;
use App\Models\UserSavingTransaction;
use App\Models\UserTopup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimSukarelaController extends Controller
{
    public function index()
    {
        $anggotaID = Auth::user()->id;
        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)->where('user_id', $anggotaID)->sum('amount');
        $totalTopUpSukarela = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('description', 'Topup Saldo Jimpay')
            ->where('status', 1)->sum('amount');
        $totalTarikSimpSukarela = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->sum('amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTopUpSukarela - $totalTarikSimpSukarela;

        // dd($totalTarikSimpSukarela);
        return view('user.sim-sukarela.index', compact('saldoSukarela', 'anggotaID', 'totalSimpananSukarela', 'totalTopUpSukarela', 'totalTarikSimpSukarela'));
    }

    public function show()
    {
        $anggotaID = Auth::user()->id;
        $simpananSukarela = UserSaving::where('kop_product_id', 3)->where('user_id', $anggotaID)->paginate(6);

        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)
            ->where('user_id', $anggotaID)
            ->sum('amount');
        $totalTopUpSukarela = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('description', 'Topup Saldo Jimpay')
            ->where('status', 1)
            ->sum('amount');
        $totalTarikSimpSukarela = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->sum('amount');
        $saldoSukarela = $totalSimpananSukarela - $totalTopUpSukarela - $totalTarikSimpSukarela;

        return view('user.sim-sukarela.show', compact('simpananSukarela', 'anggotaID', 'totalSimpananSukarela', 'totalTopUpSukarela', 'saldoSukarela'));
    }

    public function detailPenarikan()
    {
        $anggotaID = Auth::user()->id;
        $detailPenarikanSukarela = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->get();
        $totalPenarikanSukarela = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->sum('amount');

        return view('user.sim-sukarela.detailpenarikan', compact('anggotaID', 'detailPenarikanSukarela', 'totalPenarikanSukarela'));
    }

    public function tarik()
    {
        $anggotaID = Auth::user()->id;
        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)
            ->where('user_id', $anggotaID)->sum('amount');
        $totalTransaksiTarik = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->sum('amount');
        $totalTopUpSukarela = UserSavingTransaction::where('user_id', $anggotaID)
            ->where('description', 'Topup Saldo Jimpay')
            ->where('status', 1)->sum('amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        return view('user.sim-sukarela.tarik', compact('saldoSukarela'));
    }

    public function tarikStore(Request $request)
    {
        $request->validate([
            'nominal_tarik' => 'required|numeric'
        ]);

        UserSavingTransaction::create([
            'user_id' => Auth::user()->id,
            'kop_product_id' => 3,
            'amount' => $request->nominal_tarik,
            'description' => $request->keterangan,
            'transaction_date' => Carbon::now(),
            'status' => 0,
        ]);

        return redirect()->route('user.sim-sukarela.index')
            ->with('success', 'Pengajuan pencairan terkirim. Silahkan ditunggu proses dari kami');
    }
}
