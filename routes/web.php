<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\R1PesertaController;
use App\Http\Controllers\R1AdminController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin/pos/{id}', [R1AdminController::class, 'index'])->name('admin.pos');
Route::post('/admin/pos/{id}/tambah', [R1AdminController::class, 'tambahKomponen'])->name('admin.tambah');

Route::get('/pos/{id}', [R1PesertaController::class, 'showPos'])->name('pos.show');
Route::post('/pos/{id}/klaim', [R1PesertaController::class, 'klaimPos'])->name('pos.klaim');

Route::get('/produksi', [R1PesertaController::class, 'showProduksi'])->name('produksi');
Route::post('/produksi/{jenis}', [R1PesertaController::class, 'produksiSepeda'])->name('produksi.sepeda');

Route::get('/jual', [R1PesertaController::class, 'showJual'])->name('jual');
Route::post('/jual', [R1PesertaController::class, 'jualSepeda'])->name('jual.sepeda');

?>
