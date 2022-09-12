<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPengaduanController extends Controller
{
    public function index(Request $request)
    {
       if (Auth::guest()){
        return view('login');
       }
        // return view('detail_Pengaduan');
        $key = $request->id_Pengaduan;
        $data = DB::table('data_pengaduan')->where('id_Pengaduan', $key)->get();
        return view('detail_Pengaduan', ['datas'=>$data]);
        
    }
    
    public function detail()
    {//

    }
}
