<?php

namespace App\Http\Controllers;

use App\Models\Deviden;
use App\Models\User;
use App\Models\UserSaving;
use App\Models\UserSavingTransaction;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();
        $saldo = $users->balance;

        $histories = Transaction::where('payable_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(3);
        $totalHistoryIn = Transaction::where('payable_id', Auth::user()->id)->where('type', 'deposit')->sum('amount');
        $totalHistoryOut = Transaction::where('payable_id', Auth::user()->id)->where('type', 'withdraw')->sum('amount');

        $simPokok = UserSaving::where('kop_product_id', 1)->where('user_id', Auth::user()->id)->sum('amount');
        $simWajib = UserSaving::where('kop_product_id', 2)->where('user_id', Auth::user()->id)->sum('amount');

        $totalSimpananSukarela = UserSaving::where('kop_product_id', 3)
            ->where('user_id', Auth::user()->id)->sum('amount');
        $totalTransaksiTarik = UserSavingTransaction::where('user_id', Auth::user()->id)
            ->where('kop_product_id', 3)
            ->where('description', 'Tarik Simpanan Sukarela')
            ->where('status', 1)
            ->sum('amount');
        $totalTopUpSukarela = UserSavingTransaction::where('user_id', Auth::user()->id)
            ->where('description', 'Topup Saldo Jimpay')
            ->where('status', 1)->sum('amount');
        $simSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        $totalShu = 10000000;

        $userCapital = $simPokok + $simWajib + $simSukarela;
        $totalSimpananAnggota = UserSaving::sum('amount');
        $prosentaseShuUserCapital = $userCapital / $totalSimpananAnggota;

        $userCapitalDeviden = Deviden::first()->user_capital;
        $totalShuUserCapital = $totalShu / $userCapitalDeviden;
        $shuUserCapitalDiterima = round($prosentaseShuUserCapital * $totalShuUserCapital);

        $userActivities = abs(Transaction::where('payable_id', Auth::user()->id)->where('type', 'withdraw')->sum('amount'));
        $totalAktifitasAnggota = abs(Transaction::where('type', 'withdraw')->sum('amount'));
        $prosentaseShuUserAcctivity = $userActivities / $totalAktifitasAnggota;

        $userActivityDeviden = Deviden::first()->user_activity;
        $totalShuUseractivity = $totalShu / $userActivityDeviden;
        $shuUserActivityDiterima = round($prosentaseShuUserAcctivity * $totalShuUseractivity);

        // dd($shuUserActivityDiterima);
        return view('dashboard', compact('saldo', 'histories', 'totalHistoryIn', 'totalHistoryOut', 'totalShu', 'shuUserCapitalDiterima', 'shuUserActivityDiterima', 'userCapitalDeviden', 'userActivityDeviden'));
    }
}
