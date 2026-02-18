<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function perfil()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Obtiene el usuario autenticado

        // Traemos los cursos
        $cursos = $user->cursos;

        // OBTENER LA SUSCRIPCIÓN
        // Usamos first() para obtener el objeto con los datos, 
        // y opcionalmente ordenamos por la más reciente.
        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();

        // Pasamos todo a la vista
        return view('user.cursos', [
            'cursos' => $cursos,
            'usuario' => $user->name,
            'subscription' => $subscription, // <--- Ahora la vista la reconoce
        ]);
    }


    public function index()
    {
        $cursos = Curso::all(); // Obtiene todos los cursos de la base de datos
        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }
}
