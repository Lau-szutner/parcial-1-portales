<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|string|min:8|confirmed"
        ]);

        // 1. Creamos el usuario
        $user = User::create($validated);

        // 2. Creamos la suscripción inicial vinculada a este usuario
        $user->subscriptions()->create([
            'plan_level' => 1,
            'status' => 'active',
            'starts_at' => now(),
            'ends_at' => now()->addMonths(12),
        ]);

        Auth::login($user);

        // Un pequeño tip: si acabas de loguear al usuario, 
        // quizás quieras mandarlo al "perfil" o "home" en lugar de "login"
        return redirect()->route("login")->with('success', '¡Bienvenido! Tu plan Starter está activo.');
    }
}
