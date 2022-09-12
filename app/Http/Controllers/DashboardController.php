<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
       if (Auth::guest()){
        return view('login');
       }
       // count jenis produk
       $countProduct1 = DB::table('data_pengaduan')->where('jenis_Kiriman','CASH ON DELIVERY')->count();
       $countProduct2 = DB::table('data_pengaduan')->where('jenis_Kiriman','PAKET JUMBO')->count();
       $countProduct3 = DB::table('data_pengaduan')->where('jenis_Kiriman','PP BIASA DN')->count();
       $countProduct4 = DB::table('data_pengaduan')->where('jenis_Kiriman','PAKET KILAT KHUSUS')->count();
       $countProduct5 = DB::table('data_pengaduan')->where('jenis_Kiriman','SURAT KILAT KHUSUS')->count();
       $countProduct6 = DB::table('data_pengaduan')->where('jenis_Kiriman','REMITTANCE SERVICES')->count();
       $countProduct7 = DB::table('data_pengaduan')->where('jenis_Kiriman','POS EXPRESS')->count();
       $countProduct8 = DB::table('data_pengaduan')->where('jenis_Kiriman','KORPORAT PRIORITAS')->count();
       $countProduct9 = DB::table('data_pengaduan')->where('jenis_Kiriman','EXPRESS MAIL SERVICES')->count();
       $countProduct10 = DB::table('data_pengaduan')->where('jenis_Kiriman','LAIN-LAIN')->count();

        return View::make('dashboard')->with(
                                            [
                                                'countProduct1' => $countProduct1,
                                                'countProduct2' => $countProduct2,
                                                'countProduct3' => $countProduct3,
                                                'countProduct4' => $countProduct4, 
                                                'countProduct5' => $countProduct5,
                                                'countProduct6' =>  $countProduct6,
                                                'countProduct7' =>  $countProduct7,
                                                'countProduct8' =>  $countProduct8,
                                                'countProduct9' =>  $countProduct9,
                                                'countProduct10' => $countProduct10
                                            ]);
    }

}
