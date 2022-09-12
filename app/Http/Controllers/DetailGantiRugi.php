<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\data_ganti_rugi;
use PDF;

class DetailGantiRugi extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return view('login');
           }
            return view('detail_ganti_rugi');
    }

    
}
