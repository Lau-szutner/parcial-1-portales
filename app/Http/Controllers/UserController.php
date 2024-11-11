<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Método para mostrar el perfil
    public function profile()
    {
        // Verifica el rol del usuario autenticado
        $user = Auth::user();

        if ($user->rol === 'admin') {
            // Redirige a la vista de administración si el rol es "admin"
            return redirect()->route('dashboard');
        } else {
            // Redirige a la vista de perfil de usuario si es un usuario normal
            return view('user.profile'); // Asegúrate de tener esta vista creada
        }
    }

    // Método para actualizar el perfil del usuario
    public function updateProfile(Request $request)
    {
        // Obtiene al usuario autenticado
        $user = Auth::user();

        // Valida los datos del formulario (ajustar reglas según sea necesario)
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            // Otras reglas de validación para los campos del perfil
        ]);


        return redirect()->route('profile')->with('success', 'Perfil actualizado con éxito.');
    }
}
