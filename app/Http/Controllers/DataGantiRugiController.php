<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\data_ganti_rugi;
use Carbon\Carbon;
use PDF;

class DataGantiRugiController extends Controller
{
    public function index()
    {
       if (Auth::guest()){
        return view('login');
       }
        return view('data_ganti_rugi');
    }
    
    public function database()
    {
        $jenis = DB::table('jenis_pengaduan')->get();
        $produk = DB::table('jenis_produk')->get();
        $data = DB::table('data_ganti_rugi')->paginate(10);
        return view('data_ganti_rugi', [
            'jenis' => $jenis,
            'produk' => $produk,
            'data' => $data
        ]);
    }
    public function detail(Request $request)
    {    
        if (Auth::guest()){
            return view('login');
            }
            $data =  DB::table('data_ganti_rugi')
                            ->join('isi_kiriman', 'data_ganti_rugi.id', '=', 'isi_kiriman.id_surat_pengajuan')
                            ->where('data_ganti_rugi.id', $request->id )
                            ->get();
            $data_barang = DB::table('isi_kiriman')
                            ->where('isi_kiriman.id_surat_pengajuan', $request->id )
                            ->get();
            return view('detail_ganti_rugi', ['data' => $data, 'dataBarang' => $data_barang]);
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $deleted = DB::table('data_ganti_rugi')->where('id', $id)->delete();
        $deletedIsiKiriman = DB::table('isi_kiriman')->where('id_surat_pengajuan', $id)->delete();

        if($deleted){
            //redirect dengan pesan sukses
            return redirect('data_ganti_rugi')->with(['successDelete' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect('data_ganti_rugi')->with(['errorDelete' => 'Data Gagal Dihapus!']);
        }
    }
    public function getEdit(Request $request)
    {
        if (Auth::guest()){
            return view('login');
           }
            $data =  DB::table('data_ganti_rugi')->where('id', $request->id)->get();
            $data_barang =  DB::table('data_ganti_rugi')
                            ->join('isi_kiriman', 'data_ganti_rugi.id', '=', 'isi_kiriman.id_surat_pengajuan')
                            ->where('data_ganti_rugi.id', $request->id )
                            ->get();
            $jenis = DB::table('jenis_pengaduan')->get();
            $jenisSurat = DB::table('jenis_surat')->get();
            $produk = DB::table('jenis_produk')->get();
            return view('editPengajuanGantiRugi', [
                'jenis' => $jenis,
                'produk' => $produk,
                'data' =>$data,
                'dataBarang' =>$data_barang,
                'jenisSurat' => $jenisSurat
            ]);
    }
    public function edit(Request $request){
        $nomor_surat="$request->id_surat_1/$request->id_surat_2/$request->id_surat_3";
        $auth = auth()->user()->username;
        $current_date_time = Carbon::now()->toDateTimeString();
        $update = DB::table('data_ganti_rugi')->where('id', $request->id)->update([
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
            'diubah_oleh' => $auth,
            'updated_at' => $current_date_time
        ]);

        //cari id suraat
        $checkRow =DB::table('data_ganti_rugi')->orderBy('id','desc')->limit(1)->get();
        $idSurat = intval($checkRow[0]->id);
        // dd($idSurat);
        $updatetBarang = DB::table('isi_kiriman')->where('id_surat_pengajuan', $request->id)->update([
            'jumlah' => $request->jumlah,
            'isi_kiriman' => $request->isi_kiriman,
            'berat' => $request->berat_isi_barang,
            'bahan' => $request->bahan,
            'negara_pembuat' => $request->negara_pembuat,
            'nilai_isi_kiriman' => $request->nilai_isi_barang,
            'updated_at' => $current_date_time
        ]);
        if($update){
            //redirect dengan pesan sukses
            return redirect('data_ganti_rugi')->with(['successInsert' => 'Data Berhasil Diubah!']);
        }else{
            //redirect dengan pesan error
            return redirect('data_ganti_rugi')->with(['errorInsert' => 'Data Gagal Diubah!']);
        }
    }
    public function exportPDF() {
        $jenis = DB::table('jenis_pengaduan')->get();
        $produk = DB::table('jenis_produk')->get();
        $data = data_ganti_rugi::all();
        $pdf = PDF::loadView('data_ganti_rugi', [
            'jenis' => $jenis,
            'produk' => $produk,
            'data' => $data]);
        return $pdf->download('download.pdf');
    }
    public function printPDF(Request $request) {
        $data =  DB::table('data_ganti_rugi')
                            ->join('isi_kiriman', 'data_ganti_rugi.id', '=', 'isi_kiriman.id_surat_pengajuan')
                            ->where('data_ganti_rugi.id', $request->id )
                            ->get();
        $data_barang = DB::table('isi_kiriman')
                            ->where('isi_kiriman.id_surat_pengajuan', $request->id )
                            ->get();
        // return view('printPDF', [
        //     'dataBarang' => $data_barang,
        //     'data' => $data]);
        
        $pdf = PDF::loadView('printPDF', [
            'dataBarang' => $data_barang,
            'data' => $data]);
        $pdf->setPaper('Legal', 'Potrait');
        // $pdf->loadHtml('<img src="assets/img/logo-black.png" style="width:120px;">');
        return $pdf->download("suratPengajuanGantiRugi_$request->id.pdf"); 
        
    }
}
