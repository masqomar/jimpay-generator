<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('user.profil.index');
    }

    public function changePassword()
    {
        return view('user.profil.password');
    }

    public function editProfil()
    {
        return view('user.profil.detail');
    }
}
