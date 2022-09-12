<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\DaftarAkunController;
use App\Http\Controllers\DataGantiRugiController;
use App\Http\Controllers\DataPengaduanController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DetailPengaduanController;
use App\Http\Controllers\PengaturanBotTelegramController;
use App\Http\Controllers\BuatPengaduanBaruController;
use App\Http\Controllers\EditPengaduanController;
use App\Http\Controllers\AjukanGantiRugiController;
use App\Http\Controllers\BuatPengajuanGantiRugiController;
use App\Http\Controllers\DetailGantiRugi;
use App\Http\Controllers\Profile;




// Route::get('dashboard-grafik', function () {
//     return view('dashboard-grafik');
// });
// Route::get('', function () {
//     return view('dashboard');
// });
Route::get('',[DatabaseController::class, 'count', 'index']);
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('dashboard',[DatabaseController::class, 'count', 'index']);
Route::get('daftar_akun', [DaftarAkunController::class, 'index']);
Route::get('bantuan', [BantuanController::class, 'index']);
Route::get('kontak', [KontakController::class, 'index']);
Route::get('datapengaduan', [DatabaseController::class, 'dataPengaduan'], 
                            [DataPengaduanController::class, 'index']); 
Route::get('data_ganti_rugi', [DataGantiRugiController::class, 'database', 'index']);
Route::post('insert', [DatabaseController::class, 'creat']);
Route::post('insert', [DatabaseController::class, 'creat']);
Route::get('pengaturanBotTelegram', [PengaturanBotTelegramController::class, 'database'], [PengaturanBotTelegramController::class, 'index']);
Route::post('store/akun', [DatabaseController::class, 'store']);
Route::post('userLogin', [LoginController::class, 'authenticate']);
// Route::get('dashboard', [DatabaseController::class, 'count']);
Route::get('detailPengaduan/{id_Pengaduan}', [DetailPengaduanController::class, 'index']);
Route::get('deletePengaduan/{id_Pengaduan}', [DatabaseController::class, 'delete']);
Route::get('buatPengaduanBaru', [BuatPengaduanBaruController::class, 'database','index']);
Route::post('insertPengaduan', [BuatPengaduanBaruController::class, 'insert']);
Route::get('search', [DataPengaduanController::class, 'search']);
Route::get('filter', [DataPengaduanController::class, 'filter']);
Route::get('read', [DataPengaduanController::class, 'read']);
Route::get('semua', [DataPengaduanController::class, 'allData']);
Route::get('editPengaduan/{id_Pengaduan}', [EditPengaduanController::class, 'database', 'index']);
Route::post('updatePengaduan', [EditPengaduanController::class, 'update']);
Route::get('ajukanGantiRugi/{id_Pengaduan}', [AjukanGantiRugiController::class, 'insert']);
Route::get('buatPengajuanGantiRugi', [BuatPengajuanGantiRugiController::class, 'database', 'index']);
Route::get('buatPengajuanGantiRugi/{id_Pengaduan}', [BuatPengajuanGantiRugiController::class, 'database', 'index']);
Route::post('sendResponse', [EditPengaduanController::class, 'sendResponse']);
Route::post('newInsertGantiRugi', [BuatPengajuanGantiRugiController::class, 'newInsert']);
Route::get('datapengaduan/exportPDF', [DataPengaduanController::class, 'exportPDF']);
Route::get('data_ganti_rugi/exportPDF', [DataGantiRugiController::class, 'exportPDF']);
Route::get('data_ganti_rugi/delete/{id}', [DataGantiRugiController::class, 'delete']);
Route::get('data_ganti_rugi/detail/{id}', [DataGantiRugiController::class, 'detail']);
Route::get('data_ganti_rugi/edit/{id}', [DataGantiRugiController::class, 'getEdit']);
Route::post('data_ganti_rugi/insertEditGantiRugi', [DataGantiRugiController::class, 'edit']);
Route::get('printPDF/{id}', [DataGantiRugiController::class, 'printPDF']);
Route::get('userProfile', [Profile::class, 'index']);
Route::post('editEmailProfile', [Profile::class, 'edit']);
Route::post('editPasswordProfile', [Profile::class, 'edit']);
Route::post('editProfile', [Profile::class, 'edit']);
Route::post('editImgProfile', [Profile::class, 'edit']);


// Route::get('printPDF/{id}', function () {
//     return view('printPDF');
// });

