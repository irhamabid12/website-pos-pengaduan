<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BuatPengajuanGantiRugiController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return view('login');
           }
                return view('buatPengajuanGantiRugi');
    }
    public function database()
    {
        $jenis = DB::table('jenis_pengaduan')->get();
        $produk = DB::table('jenis_produk')->get();
        return view('buatPengajuanGantiRugi', [
            'jenis' => $jenis,
            'produk' => $produk
        ]);
    }

    public function newInsert(Request $request){
        // dd($request->all());
        $nomor_surat="$request->id_surat_1/$request->id_surat_2/$request->id_surat_3";
        $auth = auth()->user()->username;
        $current_date_time = Carbon::now()->toDateTimeString();
        $insert = DB::table('data_ganti_rugi')->insert([
            'id_Pengaduan' => '',
            'kantor_pos' => $request->kantor_pos,
            'tanggal_surat' =>$request->tanggal_surat,
            'nomor_surat' =>$nomor_surat,
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_hp_pelanggan' => $request->hp_Pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'nomor_resi' => $request->nomor_resi,
            'kantor_asal_kiriman' => $request->kantor_asal_kiriman,
            'biaya_kirim' => $request->biaya_kirim,
            'nilai_ganti_rugi' => $request->nilai_jaminan_gr,
            'tanggal_kirim' => $request->tanggal_kirim,
            'berat_barang' => $request->berat,
            'nilai_barang' => $request-> nilai_barang,
            'jenis_pengaduan' => $request->jenis_Pengaduan,
            'jenis_kiriman' => $request->jenis_kiriman,
            'nama_pengirim' => $request->nama_pengirim,
            'email_pengirim' => $request->email_pengirim,
            'nomor_hp_pengirim' => $request->nomor_hp_pengirim,
            'kode_pos_pengirim' => $request->kode_pos_pengirim,
            'alamat_pengirim' => $request->alamat_pengirim,
            'nama_penerima' => $request->nama_penerima,
            'email_penerima' =>$request->email_penerima,
            'nomor_hp_penerima' =>$request->nomor_hp_penerima,
            'kode_pos_penerima' =>$request->kode_pos_penerima,
            'alamat_penerima' =>$request->alamat_penerima,
            'keterangan_isi_kiriman' =>$request->isiBarang,
            'jenis_kerugian'=>$request->jenis_kerugian,
            'jenis_keterlambatan' =>$request->jenis_terlambat,
            'jumlah_kehilangan' =>$request->jumlah_kehilangan,
            'bukti_kehilangan' =>$request->bukti_kehilangan,
            'bukti_kerusakan' =>$request->bukti_kerusakan,
            'tanggal_bukti' =>$request->tanggal_dokumen,
            'jumlah_ganti_rugi' =>$request->jumlah_ganti_rugi,
            'beban_perusahaan' =>$request->rincian_gr1,
            'beban_pegawai' =>$request->rincian_gr2,
            'beban_mitra' =>$request->rincian_gr3,
            'status' =>'pengajuan ganti rugi',
            'ditambah_oleh' => $auth,
            'diubah_oleh' => $auth,
            'created_at' => $current_date_time,
            'updated_at' => $current_date_time
        ]);

        //cari id suraat
        $checkRow =DB::table('data_ganti_rugi')->orderBy('id','desc')->limit(1)->get();
        $idSurat = intval($checkRow[0]->id);
        // dd($idSurat);
        $insertBarang = DB::table('isi_kiriman')->insert([
            'id_surat_pengajuan' => $idSurat,
            'jumlah' => $request->jumlah,
            'isi_kiriman' => $request->isi_kiriman,
            'berat' => $request->berat_isi_barang,
            'bahan' => $request->bahan,
            'negara_pembuat' => $request->negara_pembuat,
            'nilai_isi_kiriman' => $request->nilai_isi_barang,
            'created_at' => $current_date_time,
            'updated_at' => $current_date_time
        ]);
        if($insert){
            //redirect dengan pesan sukses
            return redirect('data_ganti_rugi')->with(['successInsert' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('data_ganti_rugi')->with(['errorInsert' => 'Data Gagal Disimpan!']);
        }
    }
}
