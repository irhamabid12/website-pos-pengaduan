<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BantuanController extends Controller
{
    public function index()
    {
       if (Auth::guest()){
        return view('login');
       }
        return view('bantuan');
    }
}
