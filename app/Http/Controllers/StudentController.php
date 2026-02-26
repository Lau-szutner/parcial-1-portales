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

        
        if (!$subscription) {
            return redirect()->route('user.cursos')
                ->with('error', "No tienes una suscripción activa para inscribirte.");
        }

        $subscriptionLevel = $subscription->plan_level;


        if ($curso->nivel > $subscriptionLevel) {
            return redirect()->route('student.dashboard')
                ->with('error', "Tu suscripción actual es nivel {$subscriptionLevel}. Este curso requiere nivel {$curso->nivel}.");
        }


        $user->cursos()->syncWithoutDetaching([$id]);

        return redirect()->route('student.dashboard')
            ->with('success', "¡Inscripción exitosa! Bienvenido a: {$curso->nombre}");
    }
}
