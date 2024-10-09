<?php

namespace App\Http\Controllers;

use App\Models\Curso; // Asegúrate de importar el modelo Curso
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
}
