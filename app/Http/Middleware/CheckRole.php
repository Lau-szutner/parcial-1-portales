<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/login'); // Redirige a login si no está autenticado
        }

        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Verifica si el rol es 'admin'
        if ($user->rol !== 'admin') {
            return redirect('/'); // Redirige si el rol no es 'admin'
        }

        return $next($request);
    }
}
