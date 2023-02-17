<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserSaving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimWajibController extends Controller
{
    public function index()
    {
        $anggotaID = Auth::user()->id;
        $simpananWajib = UserSaving::where('kop_product_id', 2)
            ->where('user_id', $anggotaID)
            ->paginate(6);

        $totalSimpananWajib = UserSaving::where('kop_product_id', 2)
            ->where('user_id', $anggotaID)
            ->sum('amount');

        return view('user.sim-wajib.index', compact('simpananWajib', 'anggotaID', 'totalSimpananWajib'));
    }
}
