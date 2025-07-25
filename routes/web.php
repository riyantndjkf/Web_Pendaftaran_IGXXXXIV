<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\SoalQRController;
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

    Route::get('/question/{id}', [SoalQRController::class, 'show'])
        ->middleware('cek.soal.qr')->name('rally-2.question');

    Route::post('/question/{id}/submit', [SoalQRController::class, 'submit'])
        ->name('question.submit');

    Route::get('/qr-redirect/{id}', function ($id) {
        session()->put("akses_soal_$id", true);
        return redirect()->route('rally-2.question', $id);
    });
});

Route::get('rally-2/{id}', function ($id) {
        if (is_numeric($id)) {
            return redirect("/rally-2/qr-redirect/$id");
        }

        abort(404);
    });
