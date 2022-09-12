<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dataPengaduan;
use PDF;

class DataPengaduanController extends Controller
{
    public function index()
    {
       if (Auth::guest()){
        return view('login');
       }
        return view('dataPengaduan');
    }
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $data = DB::table('data_pengaduan')
                ->where('id_Pelanggan','LIKE','%'.$keyword.'%')
                ->orWhere('jenis_Pengaduan','LIKE','%'.$keyword.'%')
                ->orWhere('jenis_Kiriman','LIKE','%'.$keyword.'%')
                ->orWhere('sumber_Pengaduan','LIKE','%'.$keyword.'%')
                ->orWhere('status','LIKE','%'.$keyword.'%')
                ->orWhere('ditambah_Oleh','LIKE','%'.$keyword.'%')
                ->orWhere('diubah_Oleh','LIKE','%'.$keyword.'%')
                ->orWhere('nomor_Resi','LIKE','%'.$keyword.'%')
                ->orWhere('email_Pelanggan','LIKE','%'.$keyword.'%')
                ->orWhere('nomor_HP_Pelanggan','LIKE','%'.$keyword.'%')
                ->orWhere('Kantor_Asal_Kiriman','LIKE','%'.$keyword.'%')
                ->orWhere('Kantor_Tujuan_Kiriman','LIKE','%'.$keyword.'%')
                ->orWhere('isi_Pengaduan','LIKE','%'.$keyword.'%')
                ->orWhere('nama_Pelanggan','LIKE','%'.$keyword.'%')
                ->paginate(10);
        $c = count($data);

        if ($c == 0){
            return '<p>Maaf data tidak ditemukan!!</p>';
        } else{
            return view('search')->with([
                'datas' => $data
            ]);
        }
    }

    public function filter(Request $request)
    {   
        $filterPengaduan = $request->pengaduan;
        $filterStatus = $request->status;
        $filterDateStart = $request->dateStart;
        $filterDateEnd = $request->dateEnd;

        if($filterStatus == 'Belum Ditangani'){
            $filterStatus = 'Belum Selesai';
        }
        // elseif($filterPengaduan == ""){
        //     allData();
        // }
        $data = DB::table('data_pengaduan')
        ->where('jenis_Pengaduan', $filterPengaduan)
        ->orWhere('status', $filterStatus)
        ->orWhereDate('created_at', [$filterDateStart, $filterDateEnd])
        // ->orWhere(function ($dateFilter) {$dateFilter->whereDate('created_at',[$filterDateStart, $filterDateEnd]);})
        ->get();
       
            return view('search')->with([
                'datas' => $data
            ]);
    }

    public function allData(){
        $data = DB::table('data_pengaduan')-get();
        return view('search')->with([
            'datas' => $data
        ]);
    }

    public function exportPDF() {
        $data = DB::table('data_pengaduan')->get();
        $pdf = PDF::loadView('exportPDF_dataPengaduan', ['data' => $data]);
        $pdf->setPaper('Legal', 'Landscape');        
        return $pdf->download('tes.pdf');
    }
}
