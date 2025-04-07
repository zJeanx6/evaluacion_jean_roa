<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{

    public function handle(Request $request, Closure $next, $role): Response{

        if (Auth::user()->role_id != $role) {
            abort(403, 'No tienes permiso para acceder.');
        }
        return $next($request);
    }
}
