<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarAkunController extends Controller
{
    public function index()
    {
        return view('daftar_akun');
    }
}
