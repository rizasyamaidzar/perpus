<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SimpanController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RangkingController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SimpanBukuController;
use App\Http\Controllers\SoalResultController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardSiswaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('/',HomeController::class);
// Route Login
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout'])->middleware('auth');
// End Route Login

// ROUTE ADMIN
Route::resource('/dashboard',DashboardAdminController::class);
Route::resource('/category',CategoryController::class)->middleware('admin');
Route::resource('/soal',SoalController::class)->middleware('admin');
Route::resource('/soalresult',SoalResultController::class);
Route::resource('/option',OptionsController::class)->middleware('admin');
Route::resource('/rak',RakController::class)->middleware('admin');
Route::resource('/datasiswa',SiswaController::class)->middleware('admin');
Route::resource('/dataadmin',GuruController::class)->middleware('admin');
Route::resource('/buku',BukuController::class)->middleware('admin');
Route::resource('/admin',GuruController::class)->middleware('admin');
Route::post('/import', [SiswaController::class,'importexcel'])->middleware('admin');
Route::post('/kembali', [PengembalianController::class,'kembali'])->middleware('admin');

// END ROUTE ADMIN

// ROUTE SISWA
Route::resource('/dashboardsiswa',DashboardSiswaController::class);
Route::resource('/simpan',SimpanBukuController::class);
Route::resource('/daftarbuku',BukuController::class);

// END ROUTE SISWA


// ROUTE TRANSAKSI
Route::post('/peminjaman/scan', [PeminjamanController::class, 'scan'])->name('peminjaman.scan');
Route::resource('/peminjaman',PeminjamanController::class);
Route::resource('/pengembalian',PengembalianController::class);
Route::resource('/rangking',RangkingController::class);
// END ROUTE TRANSAKSI

Route::resource('/daftarbuku',SimpanController::class);

Route::resource('/profil',BiodataController::class);


// Route::get('/', function () {
//     return view('siswa.daftarbuku');
// });

Route::resource('/siswa',SiswaController::class)->middleware('auth');

