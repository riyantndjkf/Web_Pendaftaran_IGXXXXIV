<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekRoutingPeserta
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentPhase = config('game.current_phase');

        if (Auth::check() && Auth::user()->role === 'peserta') {
            $path = $request->path(); // contoh: peserta/kotalama, peserta/ubaya
 if (
                $path === 'peserta' || 
                $path === 'peserta/' || 
                str_starts_with($path, 'peserta/accountdetail')
            ) {
                return $next($request);
            }

            // Validasi berdasarkan fase
            switch ($currentPhase) {
                // Jika nanti aktifkan rally-1
                // case 'rally-1':
                //     if (!str_starts_with($path, 'peserta/rally1')) {
                //         return redirect()->route('peserta.rally-1.index')->with('error', 'Hanya bisa mengakses Rally 1 saat ini.');
                //     }
                //     break;

                case 'rally-2':
                    if (!str_starts_with($path, 'peserta/rally2')) {
                        return redirect()->route('peserta.rally-2.index')->with('error', 'Anda hanya bisa mengakses Ubaya saat ini.');
                    }
                    break;

                default:
                    return abort(403, 'Fase permainan tidak dikenali.');
            }

            return $next($request);
        }

        if (Auth::guest()) {
            return redirect()->route('login');
        }

        return abort(404);
    }
}
