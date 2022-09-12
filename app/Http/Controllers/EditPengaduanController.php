<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class EditPengaduanController extends Controller
{
    public function index(){
        if (Auth::guest()){
            return view('login');
           }
            return view('editPengaduan');
    }

    public function database(Request $request){
        $key = $request->id_Pengaduan;
        $data = DB::table('data_pengaduan')->where('id_Pengaduan', $key)->get();
        $jenis = DB::table('jenis_pengaduan')->get();
        $produk = DB::table('jenis_produk')->get();
        $status = DB::table('jenis_status')->get();
        $sumber = DB::table('sumber_pengaduan')->get();
        return view('editPengaduan', [
                    'data'=> $data,
                    'jenis' => $jenis,
                    'produk' => $produk,
                    'sumber' => $sumber,
                    'status' =>$status
        ]);
    }

    public function update(Request $request){
        $idPengaduan = $request->id_Pengaduan;
        $current_date_time = Carbon::now()->toDateTimeString();

        // dd($request->nama_Pelanggan);
        $update = DB::table('data_pengaduan')->where('id_Pengaduan', $idPengaduan)->update([
            
            'id_Pelanggan'=> $request->id_Pelanggan,
            'nama_Pelanggan' => $request->nama_Pelanggan,
            'email_Pelanggan'=> $request->email_Pelanggan,
            'nomor_HP_Pelanggan'=> $request->hp_Pelanggan,
            'jenis_Pengaduan'=> $request->jenis_Pengaduan,
            'jenis_Kiriman'=> $request->jenis_kiriman,
            'nomor_Resi'=> $request->nomor_Resi,
            'Kantor_Asal_Kiriman'=> $request->kantor_Asal_Kiriman,
            'Kantor_Tujuan_Kiriman'=> $request->kantor_Tujuan_Kiriman,
            'isi_Pengaduan'=> $request->isi_Pengaduan,
            'respon_admin'=> $request->respon_admin,
            'diubah_Oleh'=> $request->updated_by,
            'sumber_Pengaduan'=> $request->sumber_pengaduan,
            'status'=> $request->status,
            'updated_at'=> $current_date_time
        ]);

        if($update){
            //redirect dengan pesan sukses
            return redirect('../datapengaduan')->with(['successUpdate' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('../datapengaduan')->with(['errorUpdate' => 'Data Gagal Disimpan!']);
        }
    }
    public function sendResponse(Request $request){
        $this->start = microtime(true);
        $idPengaduan = $request->idPengaduan;
        $idPelanggan = $request->idPelanggan;
        $response = $request->response;
        $current_date_time = Carbon::now()->toDateTimeString();
        
        $botToken="5551417156:AAHOjVpkl3Z5QeYUOMxeJtIuyqpIE0wXyNE";

        $website="https://api.telegram.org/bot".$botToken;
        $chatId= $idPelanggan;  //Receiver Chat Id
          $params=[
              'chat_id'=>$chatId,
              'text'=>$response,
          ];
          $ch = curl_init($website . '/sendMessage');
          curl_setopt($ch, CURLOPT_HEADER, false);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
          curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $result = curl_exec($ch);
          curl_close($ch);
        $this->end = microtime(true);
        sleep(5);
        $website="https://api.telegram.org/bot".$botToken;
        $chatId= $idPelanggan;  //Receiver Chat Id
          $params=[
              'chat_id'=>$chatId,
              'text'=>'Apakah anda sudah mendapatkan respon pengaduan? /ya | /Tidak',
          ];
          $ch = curl_init($website . '/sendMessage');
          curl_setopt($ch, CURLOPT_HEADER, false);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
          curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $result = curl_exec($ch);
          curl_close($ch);
          
        //update ke database
        $update = DB::table('data_pengaduan')->where('id_Pengaduan', $idPengaduan)->update([
            'respon_admin'=> $response,
            'diubah_Oleh'=> auth()->user()->username,
            'status'=> 'SELESAI',
            'updated_at'=> $current_date_time
        ]);

        if($update){
            //  $this->end = microtime(true);
             $elapsed_time    = round((($this->end - $this->start)*1000));
            //redirect dengan pesan sukses
            return redirect('detailPengaduan/'.$idPengaduan)->with(['successSending' => "$elapsed_time ms"]);
        }else{
            //redirect dengan pesan error
            return redirect('detailPengaduan/'.$idPengaduan)->with(['errorSending' => 'Respon Gagal Dikirim!']);
        }
    }
}
