<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AjukanGantiRugiController extends Controller
{
    public function insert(Request $request)
    {
        $key = $request->id_Pengaduan;
        // dd($key);
        $current_date_time = Carbon::now()->toDateString();
        $blog = DB::table('data_pengaduan')->where('id_Pengaduan', $key)->get();
        $id_pengaduan =  $blog[0]->id_Pengaduan;
        $id_pelanggan = $blog[0]->id_Pelanggan;
        $nama = $blog[0]->nama_Pelanggan;
        $email = $blog[0]->email_Pelanggan;
        $nomor = $blog[0]->nomor_HP_Pelanggan;
        $jenis = $blog[0]->jenis_Pengaduan;
        $kiriman = $blog[0]->jenis_Kiriman;
        $resi = $blog[0]->nomor_Resi;
        $asal = $blog[0]->Kantor_Asal_Kiriman;
        $tujuan = $blog[0]->Kantor_Tujuan_Kiriman;
        $author =  auth()->user()->username;
        
        $checkData = DB::table('data__pengajuan_ganti_rugi')->where('id_Pengaduan', $key)->count();
        if ($checkData !== 0) :
            
            return redirect("detailPengaduan/$key")->with(['errorPengajuan' => 'Data Gagal Disimpan! Data sudah pernah di tambahkan.']);

        endif;

        $insert = DB::table('data__pengajuan_ganti_rugi')->where('id_Pengaduan', $key)->insert([
            'id_Pengaduan' => $id_pengaduan,
            'id_pengirim'=> $id_pelanggan,
            'nama_pengirim' => $nama,
            'email_pengirim'=> $email,
            'nomor_HP_pengirim'=> $nomor,
            'jenis_Pengaduan'=> $jenis,
            'jenis_Kiriman'=> $kiriman,
            'nomor_Resi'=> $resi,
            'kantor_Asal_Kiriman'=> $asal,
            'kantor_Tujuan_Kiriman'=> $tujuan,
            'ditambah_oleh' => $author,
            'created_at'=> $current_date_time

        ]);

        $update = DB::table('data_pengaduan')->where('id_Pengaduan', $key)->update([
            'status' => 'PENGAJUAN GANTI RUGI',
            'diubah_Oleh' => $author,
            'updated_at' => $current_date_time

        ]);


        if($insert){
            //redirect dengan pesan sukses
            return redirect("detailPengaduan/$key")->with(['successPengajuan' => 'Data Berhasil Diajukan!']);
        }
    }
        
}
