<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        return view('dashboard', compact('saldo', 'histories', 'totalHistoryIn', 'totalHistoryOut'));
    }
}
