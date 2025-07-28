<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BundleRegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini adalah file rute final Anda.
|
*/

// --- RUTE HALAMAN UTAMA & STATIS ---
Route::get('/', function () {
    return view('welcome');
})->name('qhome');


Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');




// --- RUTE OTENTIKASI BAWAAN LARAVEL ---
// Ini akan secara otomatis membuat rute seperti:
// GET /register -> Menampilkan halaman pilihan (karena akan kita override)
// POST /register -> Memproses form registrasi single
// GET /login, POST /login, dll.
Auth::routes();
// --- RUTE KUSTOM UNTUK MENAMPILKAN FORMULIR ---

// Rute ini HANYA untuk MENAMPILKAN formulir isian single team.
Route::get('/register/single-form', function () {
    return view('auth.register_single_form'); 
})->name('register.single.form');

// Rute untuk MENAMPILKAN formulir isian bundle.
Route::get('/register/bundle-form', [BundleRegistrationController::class, 'create'])->name('register.bundle.form');

// Rute untuk MEMPROSES formulir isian bundle.
Route::post('/register/bundle-form', [BundleRegistrationController::class, 'store'])->name('register.bundle.store');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});



Route::group([
    'middleware' => ['auth', 'role:peserta'],
    'prefix' => 'peserta',
    'as' => 'peserta.'
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/accountdetail', [HomeController::class, 'account'])->name('account-detail');
});