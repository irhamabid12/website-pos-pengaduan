<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JenisProdukController extends Controller
{
    public function type()
    {
        $jenis = DB::table('jenis_pengaduan', 'jenis_produk')->get();
        return view('datapengaduan', ['types' => $jenis]);
    }
}
