<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class BuatPengaduanBaruController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return view('login');
           }
                return view('buatPengaduanBaru');
    }
    public function database()
    {
        $jenis = DB::table('jenis_pengaduan')->get();
        $produk = DB::table('jenis_produk')->get();
        return view('buatPengaduanBaru', [
            'jenis' => $jenis,
            'produk' => $produk
        ]);
    }

    public function insert(Request $request)
    {
        $current_date_time = Carbon::now()->toDateTimeString();
        $blog = DB::table('data_pengaduan')->insert([
            
            'id_Pelanggan'=> $request->id_Pelanggan,
            'nama_Pelanggan' => $request->nama_Pelanggan,
            'email_Pelanggan'=> $request->email_Pelanggan,
            'nomor_HP_Pelanggan'=> $request->hp_Pelanggan,
            'jenis_Pengaduan'=> $request->jenis_Pengaduan,
            'jenis_Kiriman'=> $request->jenis_Produk,
            'nomor_Resi'=> $request->nomor_Resi,
            'Kantor_Asal_Kiriman'=> $request->kantor_Asal_Kiriman,
            'Kantor_Tujuan_Kiriman'=> $request->kantor_Tujuan_Kiriman,
            'isi_Pengaduan'=> $request->isi_Pengaduan,
            'ditambah_Oleh'=> $request->added_By,
            'diubah_Oleh'=> $request->added_By,
            'sumber_Pengaduan'=> $request->device,
            'status'=> $request->status,
            'created_at' => $current_date_time
        ]);

        if($blog){
            //redirect dengan pesan sukses
            return redirect('buatPengaduanBaru')->with(['successInsert' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('buatPengaduanBaru')->with(['errorInsert' => 'Data Gagal Disimpan!']);
        }
    }
}
