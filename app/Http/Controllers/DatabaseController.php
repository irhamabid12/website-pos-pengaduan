<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class DatabaseController extends Controller
{
    public function index()
    {
        if (Auth::guest()){
            return view('login');
        }
    }
    public function dataPengaduan()
    {
        $data = DB::table('data_pengaduan')->paginate(10);
        $jenis = DB::table('jenis_pengaduan')->get();
        $produk = DB::table('jenis_produk')->get();
        $status = DB::table('jenis_status')->get();
        return view('datapengaduan', [
            'data' => $data,
            'jenis' => $jenis,
            'status' => $status,
            'produk' => $produk
        ]);
    }
    
    public function create()
    {
        return view('daftar_akun');
    }

    public function store(Request $request)
    {
        $password = $request->password;
        $confirmPassword = $request->confirmasiPassword;
        $email = $request->email;
        $username = $request->username;
        $nipPos = $request->nipPos;

        $checkEmail = DB::table('users')->where('email', $email)->count();
        $checkUsername = DB::table('users')->where('username', $username)->count();
        $checkNippos = DB::table('users')->where('jabatan', $nipPos)->count();

        if($checkEmail != 0){
            return back()->with(['doubleEmail' => 'Email Sudah Digunakan Diakun lain!']);
        } elseif($checkNippos !=0){
            return back()->with(['doubleNippos' => 'Nippos Sudah Digunakan Diakun lain!']);
        } elseif($checkUsername !=0){
            return back()->with(['doubleUsername' => 'Username Sudah Digunakan Diakun lain!']);
        }

        if($confirmPassword == $password){
            $blog = DB::table('users')->insert([
                'name'              => $request->name,
                'email'             => $request->email,
                'username'          => $request->username,
                'nipPos'           => $request->nipPos,
                'jabatan'           => $request->jabatan,
                'password'          => Hash::make($request->password),
                'remember_token'    => $request->_token            
            ]);
            if($blog){
                //redirect dengan pesan sukses
                return redirect('daftar_akun')->with(['success' => 'Data Berhasil Disimpan!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('daftar_akun')->with(['error' => 'Data Gagal Disimpan!']);
            }
        }elseif($confirmPassword != $password){
            // toastr()->errorInsert('Konfirmasi Password Tidak Sesuai!');
            return back()->with(['errorInsert' => 'Konfirmasi Password Tidak Sesuai!']);
        }

        

        
    
    }
    
    public function count()
    {   
        if (Auth::guest()){
            return view('login');
        }
        
        $count = DB::table('data_pengaduan')->count();
        $pengaduanMasuk = DB::table('data_pengaduan')->whereDay('created_at', date('d'))->where('status', 'BELUM SELESAI')->count();
        $pengaduanKeterlambatan = DB::table('data_pengaduan')->where('jenis_Pengaduan', 'KETERLAMBATAN/BELUM TERIMA')->count();
        $pengaduanKerusakan = DB::table('data_pengaduan')->where('jenis_Pengaduan', 'KERUSAKAN')
                    ->orWhere('jenis_Pengaduan', 'Kiriman tidak utuh')
                    ->count();
        $pengaduanKehilangan = DB::table('data_pengaduan')->where('jenis_Pengaduan', 'KEHILANGAN')->count();
        $pengajuanGantiRugi = DB::table('data_ganti_rugi')->count();
        $pengaduanDiproses = DB::table('data_pengaduan')->where('status', 'DIPROSES')->count();
        $pengaduanSelesai = DB::table('data_pengaduan')->where('status', 'SELESAI')->count();
        $pengaduanLain = DB::table('data_pengaduan') ->whereNot(function ($query) {
            $query->where('jenis_Pengaduan', 'PERMINTAAN DATA/BERITA ACARA')
                  ->orWhere('jenis_Pengaduan', 'KERUSAKAN')
                  ->orWhere('jenis_Pengaduan', 'KEHILANGAN')
                  ->orWhere('jenis_Pengaduan', 'PENGAJUAN GANTI RUGI');
                })->count();
        $pengaduanDitangani = DB::table('data_pengaduan') ->whereNot(function ($query) {
                $query->where('status', 'BELUM DITANGANI');})->count();

        $pengajuanGantiRugiSelesai = DB::table('data_pengaduan')->where('status', 'BELUM SELESAI')->count();
        if ($pengaduanSelesai != 0 && $pengaduanDitangani !=0){
            $tingkatSelesai = round($pengaduanSelesai/$count*100);
            $tingkatDitangani = round($pengaduanDitangani/$count*100);
            
        }
        // end pusat monitoring count
        
        //performa count
        $countKepuasan = DB::table('tingkat_kepuasan')->count();
        $countPuas = DB::table('tingkat_kepuasan')->where('penilaian', '>=', '3')->count();
        $tingkatPuas = round($countPuas/$countKepuasan*100);
        // end performa count
        
        // pie chart count
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
        // end pie chart count

        // grafik kunjungan count
        $januari = DB::table('data_pengaduan')->whereMonth('created_at', '1')->count();
        $februari = DB::table('data_pengaduan')->whereMonth('created_at', '2')->count();
        $maret = DB::table('data_pengaduan')->whereMonth('created_at', '3')->count();
        $april = DB::table('data_pengaduan')->whereMonth('created_at', '4')->count();
        $mei = DB::table('data_pengaduan')->whereMonth('created_at', '5')->count();
        $juni = DB::table('data_pengaduan')->whereMonth('created_at', '6')->count();
        $juli = DB::table('data_pengaduan')->whereMonth('created_at', '7')->count();
        $agustus = DB::table('data_pengaduan')->whereMonth('created_at', '8')->count();
        $september = DB::table('data_pengaduan')->whereMonth('created_at', '9')->count();
        $oktober = DB::table('data_pengaduan')->whereMonth('created_at', '10')->count();
        $november = DB::table('data_pengaduan')->whereMonth('created_at', '11')->count();
        $desember = DB::table('data_pengaduan')->whereMonth('created_at', '12')->count();
        // end grafik kunjungan count

        // grafik peforma count
        $pengaduanDitangani1 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '1')->count();
        $pengaduanDitangani2 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '2')->count();
        $pengaduanDitangani3 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '3')->count();
        $pengaduanDitangani4 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '4')->count();
        $pengaduanDitangani5 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '5')->count();
        $pengaduanDitangani6 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '6')->count();
        $pengaduanDitangani7 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '7')->count();
        $pengaduanDitangani8 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '8')->count();
        $pengaduanDitangani9 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '9')->count();
        $pengaduanDitangani10 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '10')->count();
        $pengaduanDitangani11 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '11')->count();
        $pengaduanDitangani12 = DB::table('data_pengaduan') 
                            ->whereNot(function ($query) {$query->where('status', 'BELUM DITANGANI');})
                            ->whereMonth('updated_at', '12')->count();
        
        // persen tingkat ditangani
        $tingkatDitangani1 = round($pengaduanDitangani1/$count*100);
        $tingkatDitangani2 = round($pengaduanDitangani2/$count*100);
        $tingkatDitangani3 = round($pengaduanDitangani3/$count*100);
        $tingkatDitangani4 = round($pengaduanDitangani4/$count*100);
        $tingkatDitangani5 = round($pengaduanDitangani5/$count*100);
        $tingkatDitangani6 = round($pengaduanDitangani6/$count*100);
        $tingkatDitangani7 = round($pengaduanDitangani7/$count*100);
        $tingkatDitangani8 = round($pengaduanDitangani8/$count*100);
        $tingkatDitangani9 = round($pengaduanDitangani9/$count*100);
        $tingkatDitangani10 = round($pengaduanDitangani10/$count*100);
        $tingkatDitangani11 = round($pengaduanDitangani11/$count*100);
        $tingkatDitangani12 = round($pengaduanDitangani12/$count*100);

        //pengaduan selesai
        $pengaduanSelesai1 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '1')->count();
        $pengaduanSelesai2 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '2')->count();
        $pengaduanSelesai3 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '3')->count();
        $pengaduanSelesai4 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '4')->count();
        $pengaduanSelesai5 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '5')->count();
        $pengaduanSelesai6 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '6')->count();
        $pengaduanSelesai7 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '7')->count();
        $pengaduanSelesai8 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '8')->count();
        $pengaduanSelesai9 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '9')->count();
        $pengaduanSelesai10 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '10')->count();
        $pengaduanSelesai11 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '11')->count();
        $pengaduanSelesai12 = DB::table('data_pengaduan')
                            ->where('status', 'SELESAI')
                            ->whereMonth('updated_at', '12')->count();

        // persen tingkat selesai
        $tingkatSelesai1 = round($pengaduanSelesai1/$count*100);
        $tingkatSelesai2 = round($pengaduanSelesai2/$count*100);
        $tingkatSelesai3 = round($pengaduanSelesai3/$count*100);
        $tingkatSelesai4 = round($pengaduanSelesai4/$count*100);
        $tingkatSelesai5 = round($pengaduanSelesai5/$count*100);
        $tingkatSelesai6 = round($pengaduanSelesai6/$count*100);
        $tingkatSelesai7 = round($pengaduanSelesai7/$count*100);
        $tingkatSelesai8 = round($pengaduanSelesai8/$count*100);
        $tingkatSelesai9 = round($pengaduanSelesai9/$count*100);
        $tingkatSelesai10 = round($pengaduanSelesai10/$count*100);
        $tingkatSelesai11 = round($pengaduanSelesai11/$count*100);
        $tingkatSelesai12 = round($pengaduanSelesai12/$count*100);                            
        
        $countPuas1 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '1')->count();
        $countPuas2 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '2')->count();
        $countPuas3 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '3')->count();
        $countPuas4 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '4')->count();
        $countPuas5 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '5')->count();
        $countPuas6 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '6')->count();
        $countPuas7 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '7')->count();
        $countPuas8 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '8')->count();
        $countPuas9 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '9')->count();
        $countPuas10 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '10')->count();
        $countPuas11 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '11')->count();
        $countPuas12 = DB::table('tingkat_kepuasan')->whereBetween('penilaian', [3, 5])->whereMonth('created_at', '12')->count();

        $tingkatPuas1 = round($countPuas1/$count*100);
        $tingkatPuas2 = round($countPuas2/$count*100);
        $tingkatPuas3 = round($countPuas3/$count*100);
        $tingkatPuas4 = round($countPuas4/$count*100);
        $tingkatPuas5 = round($countPuas5/$count*100);
        $tingkatPuas6 = round($countPuas6/$count*100);
        $tingkatPuas7 = round($countPuas7/$count*100);
        $tingkatPuas8 = round($countPuas8/$count*100);
        $tingkatPuas9 = round($countPuas9/$count*100);
        $tingkatPuas10 = round($countPuas10/$count*100);
        $tingkatPuas11 = round($countPuas11/$count*100);
        $tingkatPuas12 = round($countPuas12/$count*100);    
        // end grafik peforma count

        return View::make('dashboard')->with(
        [
            'seluruhPengaduan' => $count,
            'pengaduanMasuk' => $pengaduanMasuk,
            'pengaduanKeterlambatan' => $pengaduanKeterlambatan,
            'pengaduanKerusakan' => $pengaduanKerusakan,
            'pengaduanKehilangan' => $pengaduanKehilangan,
            'pengajuanGantiRugi' => $pengajuanGantiRugi,
            'pengaduanDiproses' => $pengaduanDiproses,
            'pengaduanSelesai' => $pengaduanSelesai,
            'pengaduanLain' => $pengaduanLain,
            'pengaduanDitangani' => $pengaduanDitangani,
            'pengajuanGantiRugiSelesai' => $pengajuanGantiRugiSelesai,
            'jumlahKepuasan' => $countKepuasan,
            'jumlahPuas' => $countPuas,
            'tingkatPuas' => $tingkatPuas,
            'tingkatSelesai'=>$tingkatSelesai,
            'tingkatDitangani'=>$tingkatDitangani,
            
            'countProduct1' => $countProduct1,
            'countProduct2' => $countProduct2,
            'countProduct3' => $countProduct3,
            'countProduct4' => $countProduct4, 
            'countProduct5' => $countProduct5,
            'countProduct6' =>  $countProduct6,
            'countProduct7' =>  $countProduct7,
            'countProduct8' =>  $countProduct8,
            'countProduct9' =>  $countProduct9,
            'countProduct10' => $countProduct10,

            'januari' => $januari,
            'januari' => $januari,
            'februari' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $mei,
            'juni' => $juni,
            'juli' => $juli,
            'agustus' => $agustus,
            'september' => $september,
            'oktober' => $oktober,
            'november' => $november,
            'desember' => $desember,
            'tingkatDitangani1' => $tingkatDitangani1,
            'tingkatDitangani2' => $tingkatDitangani2,
            'tingkatDitangani3' => $tingkatDitangani3,
            'tingkatDitangani4' => $tingkatDitangani4,
            'tingkatDitangani5' => $tingkatDitangani5,
            'tingkatDitangani6' => $tingkatDitangani6,
            'tingkatDitangani7' => $tingkatDitangani7,
            'tingkatDitangani8' => $tingkatDitangani8,
            'tingkatDitangani9' => $tingkatDitangani9,
            'tingkatDitangani10' => $tingkatDitangani10,
            'tingkatDitangani11' => $tingkatDitangani11,
            'tingkatDitangani12' => $tingkatDitangani12,

            'tingkatSelesai1' => $tingkatSelesai1,
            'tingkatSelesai2' => $tingkatSelesai2,
            'tingkatSelesai3' => $tingkatSelesai3,
            'tingkatSelesai4' => $tingkatSelesai4,
            'tingkatSelesai5' => $tingkatSelesai5,
            'tingkatSelesai6' => $tingkatSelesai6,
            'tingkatSelesai7' => $tingkatSelesai7,
            'tingkatSelesai8' => $tingkatSelesai8,
            'tingkatSelesai9' => $tingkatSelesai9,
            'tingkatSelesai10' => $tingkatSelesai10,
            'tingkatSelesai11' => $tingkatSelesai11,
            'tingkatSelesai12' => $tingkatSelesai12,

            'tingkatPuas1' => $tingkatPuas1,
            'tingkatPuas2' => $tingkatPuas2,
            'tingkatPuas3' => $tingkatPuas3,
            'tingkatPuas4' => $tingkatPuas4,
            'tingkatPuas5' => $tingkatPuas5,
            'tingkatPuas6' => $tingkatPuas6,
            'tingkatPuas7' => $tingkatPuas7,
            'tingkatPuas8' => $tingkatPuas8,
            'tingkatPuas9' => $tingkatPuas9,
            'tingkatPuas10' => $tingkatPuas10,
            'tingkatPuas11' => $tingkatPuas11,
            'tingkatPuas12' => $tingkatPuas12,
        ]);
    
    }
    public function delete(Request $request)
    {
        $id = $request->id_Pengaduan;
        $deleted = DB::table('data_pengaduan')->where('id_Pengaduan', $id)->delete();
        if($deleted){
            //redirect dengan pesan sukses
            return redirect('datapengaduan')->with(['successDelete' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect('detailPengaduan/$id')->with(['errorDelete' => 'Data Gagal Dihapus!']);
        }
    }
}
