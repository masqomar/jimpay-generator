<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:period view')->only('index', 'show');
        $this->middleware('permission:period create')->only('create', 'store');
        $this->middleware('permission:period edit')->only('edit', 'update');
        $this->middleware('permission:period delete')->only('destroy');
    }

    public function index()
    {
        return view('file-test');
    }
}
