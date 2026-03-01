<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        if ($user->rol === 'admin') {
            return redirect()->route('dashboard');
        } else {
            return view('user.profile');
        }
    }

    public function updateProfile(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,

        ]);

        return redirect()->route('profile')->with('success', 'Perfil actualizado con éxito.');
    }
}
