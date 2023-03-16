<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWithdrawRequest;
use App\Models\Bank;
use App\Models\StoreWithdraw;
use App\Models\User;
use App\Models\WithdrawRequest;
use Bavix\Wallet\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanMitraController extends Controller
{
    public function index()
    {
        $accountId = User::where('id', Auth::user()->id)->first();
        $wallets = $accountId->balance;

        $banks = Bank::get();

        // dd($wallets);
        return view('user.mitra.index', compact('wallets', 'banks'));
    }

    public function store(StoreWithdrawRequest $request)
    {
        // dd($request->all());
        WithdrawRequest::create($request->validated() + ['user_id' => Auth::user()->id, 'extra_field' => 'Diproses']);

        return redirect()->route('user.mitra.index')
            ->with('success', 'Pengajuan pencairan terkirim. Silahkan ditunggu proses dari kami');
    }
}
