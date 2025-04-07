<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConductorEnVerificacion
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Verificar que el usuario esté autenticado y sea un conductor
        if ($user && $user->role_id == 1) {
            // Verificar si el conductor está en proceso de verificación
            $pendingUserId = $request->session()->get('pending_user_id');
            if ($pendingUserId && $pendingUserId == $user->uid) {
                return $next($request);
            }

            // Si no está en proceso de verificación, redirigir
            return redirect('/')->withErrors(['code' => 'No estás en proceso de verificación.']);
        }

        // Si no es conductor, lanzar error
        abort(403, 'Acceso denegado: No eres conductor.');
    }
}
