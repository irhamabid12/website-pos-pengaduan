<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
       if (Auth::guest()){
        return view('login');
       }
        return view('kontak');
    }
}