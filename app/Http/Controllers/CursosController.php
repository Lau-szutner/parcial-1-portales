<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }

    public function perfil()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $cursos = $user->cursos;

        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();


        return view('user.cursos', [
            'cursos' => $cursos,
            'usuario' => $user->name,
            'subscription' => $subscription,
        ]);
    }



    // REVISAR DE ENVIAR A UN CONTROLADOR DE USER Y USAR AUTH MIDDLEWARE
    public function add_curso($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $curso = Curso::findOrFail($id);

        $subscription = $user->subscriptions()
            ->where('status', 'active')
            ->where('ends_at', '>', now())
            ->latest()
            ->first();

        $subscriptionLevel = $subscription->plan_level;

        if ($curso->nivel > $subscriptionLevel) {
            return redirect()->route('user.cursos')
                ->with('error', "Tu suscripción no permite acceder a cursos de nivel {$curso->nivel}.");
        }

        $user->cursos()->syncWithoutDetaching([$id]);

        // 6️⃣ Redirigir con mensaje de éxito
        return redirect()->route('user.cursos')
            ->with('success', "Has sido inscrito en: {$curso->nombre}");
    }
}
