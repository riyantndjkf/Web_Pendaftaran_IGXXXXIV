<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}