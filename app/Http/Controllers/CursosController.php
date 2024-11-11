<?php

namespace App\Http\Controllers;

use App\Models\Curso; // Asegúrate de importar el modelo Curso
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::all(); // Obtiene todos los cursos de la base de datos
        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }

    public function adquirir(Curso $curso)
    {
        $usuario = Auth::user(); // Obtener el usuario autenticado

        // Realizar la acción de adquirir el curso
        $usuario->cursos()->attach($curso);

        // Redirigir a la vista con un mensaje de éxito
        return redirect()->route('cursos.index')
            ->with('success', 'Curso adquirido con éxito.')
            ->with('usuario', $usuario); // Pasar el usuario a la vista
    }
}
