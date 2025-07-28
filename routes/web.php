<?php

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
})->name('home');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/account', function () {
    return view('account');
})->name('account');


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

