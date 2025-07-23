<?php

use App\Http\Controllers\GameController;
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

Route::prefix('rally-2')->group(function () {
    Route::get('/', [GameController::class, 'index'])->name('rally-2.index');
    Route::get('/scanner', [GameController::class, 'scanner'])->name('rally-2.scanner');
    Route::get('/events', [GameController::class, 'events'])->name('rally-2.events');
    Route::get('/inventory', [GameController::class, 'inventory'])->name('rally-2.inventory');
});
