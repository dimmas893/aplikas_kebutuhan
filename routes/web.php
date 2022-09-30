<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Keranjangontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pengajuan_detailController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::get('/barang/delete/{id}', [BarangController::class, 'delete']);



    Route::get('/keranjang', [Keranjangontroller::class, 'index']);
    Route::post('/keranjang/store', [Keranjangontroller::class, 'store']);
    Route::post('simpan-pengajuan', [Keranjangontroller::class, 'storePengajuan']);
    Route::get('/keranjang/delete/{id}', [Keranjangontroller::class, 'delete']);

Route::post('/pengajuan/store', [PengajuanController::class, 'store']);


Route::get('/approval', [ApprovalController::class, 'index']);
Route::get('/approval/detail/{id}', [ApprovalController::class, 'detail']);
Route::get('/approval/edit/{pengajuan}/{pengajuan_detail}', [ApprovalController::class, 'edit']);
Route::get('/approval/update', [ApprovalController::class, 'update']);


Route::get('/approval/admin', [ApprovalController::class, 'admin']);
Route::post('/approval/approve_admin', [ApprovalController::class, 'approve_admin']);
Route::get('/approval/approve_admin_detail/{id}', [ApprovalController::class, 'approve_admin_detail']);
Route::get('/approval/approve_admin_edit/{pengajuan}/{pengajuan_detail}', [ApprovalController::class, 'approve_admin_edit']);
Route::get('/approval/approve_admin_update', [ApprovalController::class, 'approve_admin_update']);


Route::get('/pengajuan_detail/delete/{id}', [ApprovalController::class, 'delete']);
Route::get('/pengajuan_detail/delete_pengajuan/{id}', [ApprovalController::class, 'delete_pengajuan']);


// Route::get('/login', [LoginController::class, 'login'])->name('login');
// Route::post('/login', [LoginController::class, 'postLogin']);
// Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/superadminstore', [SuperAdminController::class, 'store']);




require __DIR__.'/auth.php';
