<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function profile()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $cursos = $user->cursos;

        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();


        return view('user.dashboard', [
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

        // 1. Buscamos el curso o lanzamos 404 si no existe
        $curso = Curso::findOrFail($id);

        // 2. Buscamos la suscripción activa
        $subscription = $user->subscriptions()
            ->where('status', 'active')
            ->where('ends_at', '>', now())
            ->latest()
            ->first();

        // 3. ¡IMPORTANTE! Validar si el usuario tiene suscripción antes de leer el nivel
        if (!$subscription) {
            return redirect()->route('user.cursos')
                ->with('error', "No tienes una suscripción activa para inscribirte.");
        }

        $subscriptionLevel = $subscription->plan_level;

        // 4. Validación de nivel
        if ($curso->nivel > $subscriptionLevel) {
            return redirect()->route('user.cursos')
                ->with('error', "Tu suscripción actual es nivel {$subscriptionLevel}. Este curso requiere nivel {$curso->nivel}.");
        }

        // 5. Inscribir (syncWithoutDetaching evita duplicados en la tabla pivote)
        $user->cursos()->syncWithoutDetaching([$id]);

        return redirect()->route('student.dashboard')
            ->with('success', "¡Inscripción exitosa! Bienvenido a: {$curso->nombre}");
    }
}
