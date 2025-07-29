<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\AdminPosController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin/pos/{id}', [AdminPosController::class, 'index'])->name('admin.pos');
Route::post('/admin/pos/{id}/tambah', [AdminPosController::class, 'tambahKomponen'])->name('admin.tambah');

Route::get('/pos/{id}', [GameController::class, 'showPos'])->name('pos.show');
Route::post('/pos/{id}/klaim', [GameController::class, 'klaimPos'])->name('pos.klaim');

Route::get('/produksi', [GameController::class, 'showProduksi'])->name('produksi');
Route::post('/produksi/{jenis}', [GameController::class, 'produksiSepeda'])->name('produksi.sepeda');

Route::get('/jual', [GameController::class, 'showJual'])->name('jual');
Route::post('/jual', [GameController::class, 'jualSepeda'])->name('jual.sepeda');

?>
