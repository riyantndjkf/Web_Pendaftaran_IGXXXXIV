<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/registersingle', function () {
    return view('registersingle');
});

Route::get('/', function () {
    return view('welcome'); // Atau 'home' jika itu nama file blade halaman utama Anda
});

// Route untuk halaman FAQ
Route::get('/faq', function () {
    return view('faq');
});

// Route untuk halaman About Us (jika sudah ada atau akan dibuat)
Route::get('/aboutus', function () {
    return view('aboutus'); // Pastikan Anda memiliki file aboutus.blade.php
});

Route::get('/account', function () {
    return view('account'); // Pastikan Anda memiliki file aboutus.blade.php
});
