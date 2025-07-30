<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\R1PesertaController;
use App\Http\Controllers\R1AdminController;

Route::get('/', function () {
    session(['namaTim' => 'TimDemo']);
    return view('home');
})->name('home');

Route::get('/admin/pos', [R1AdminController::class, 'overview'])->name('admin.overview');
Route::get('/admin/pos/{id}', [R1AdminController::class, 'index'])->name('admin.pos');
Route::post('/admin/pos/{id}/beri', [R1AdminController::class, 'beriKomponen'])->name('admin.beri');
Route::post('/admin/pos/{id}/status', [R1AdminController::class, 'updateStatus'])->name('admin.status');
Route::post('/admin/pos/{id}/menang/{tim}', [R1AdminController::class, 'beriMenang'])->name('admin.menang');
Route::post('/admin/pos/{id}/kalah/{tim}', [R1AdminController::class, 'beriKalah'])->name('admin.kalah');
Route::post('/admin/pos/{id}/gagal', [R1AdminController::class, 'beriGagal'])->name('admin.gagal');

Route::get('/komponen', [R1PesertaController::class, 'lihatKomponen'])->name('peserta.komponen');


Route::get('/pos/{id}', [R1PesertaController::class, 'showPos'])->name('pos.show');
Route::get('/peserta/pos', [R1PesertaController::class, 'daftarPos'])->name('peserta.pos');
Route::post('/peserta/pos/{id}/pergi', [R1PesertaController::class, 'pergiKePos'])->name('peserta.pos.pergi');

Route::get('/produksi', [R1PesertaController::class, 'showProduksi'])->name('produksi');
Route::post('/produksi/{jenis}', [R1PesertaController::class, 'produksiSepeda'])->name('produksi.sepeda');

Route::get('/jual', [R1PesertaController::class, 'showJual'])->name('jual');
Route::post('/jual', [R1PesertaController::class, 'jualSepeda'])->name('jual.sepeda');

Route::get('/admin', function () {
    return view('home_admin');
})->name('admin.home');
