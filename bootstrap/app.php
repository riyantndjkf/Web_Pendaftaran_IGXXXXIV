<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
         $middleware->alias([
        'role' => \App\Http\Middleware\RoleMiddleware::class,
        'cek.routing.peserta' => \App\Http\Middleware\CekRoutingPeserta::class,
        'cek.soal.qr' => \App\Http\Middleware\CekAksesSoal::class,
        'cek.claim.envelope' => \App\Http\Middleware\CekAksesEnvelope::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
