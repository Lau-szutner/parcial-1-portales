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

        $user = User::create($validated);

        $user->subscriptions()->create([
            'plan_level' => 1,
            'status' => 'active',
            'starts_at' => now(),
            'ends_at' => now()->addMonths(12),
        ]);

        Auth::login($user);

        return redirect()->route("home")->with('success', '¡Bienvenido! Tu plan Starter está activo.');
    }
}
