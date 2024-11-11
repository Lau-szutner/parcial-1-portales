<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function perfil()
    {
        // Obtiene el usuario autenticado
        $user = Auth::user(); // Obtiene el usuario autenticado
        $cursos = $user->cursos; // Relación 'cursos' para obtener los cursos del usuario

        // Pasamos los cursos y el nombre del usuario a la vista
        return view('user.cursos', [
            'cursos' => $cursos,
            'usuario' => $user->name, // Pasamos el nombre del usuario
        ]);
    }
}
