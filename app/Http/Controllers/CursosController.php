<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function perfil()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user(); // Obtiene el usuario autenticado

        // Traemos los cursos
        $cursos = $user->cursos;

        // OBTENER LA SUSCRIPCIÓN
        // Usamos first() para obtener el objeto con los datos, 
        // y opcionalmente ordenamos por la más reciente.
        $subscription = $user->subscriptions()->where('status', 'active')->latest()->first();

        // Pasamos todo a la vista
        return view('user.cursos', [
            'cursos' => $cursos,
            'usuario' => $user->name,
            'subscription' => $subscription, // <--- Ahora la vista la reconoce
        ]);
    }


    public function index()
    {
        $cursos = Curso::all(); // Obtiene todos los cursos de la base de datos
        return view('cursos.index', [
            'cursos' => $cursos,
        ]);
    }
    public function add_curso($id)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // 1️⃣ Traer el curso
        $curso = Curso::findOrFail($id);

        // 2️⃣ Traer la suscripción activa más reciente del usuario
        $subscription = $user->subscriptions()
            ->where('status', 'active')
            ->where('ends_at', '>', now())
            ->latest()
            ->first();

        // 3️⃣ Validar que exista la suscripción
        if (!$subscription) {
            return back()->with('error', 'Necesitas una suscripción activa para inscribirte.');
        }

        // 4️⃣ (Opcional) Validar nivel del curso según la subscripción
        $subscriptionLevel = $subscription->plan_level; // 1, 2 o 3
        if ($curso->nivel > $subscriptionLevel) {
            return back()->with('error', "Tu suscripción no permite acceder a cursos de nivel {$curso->nivel}.");
        }

        // 5️⃣ Agregar el curso al usuario
        $user->cursos()->syncWithoutDetaching([$id]);

        // 6️⃣ Redirigir con mensaje de éxito
        return redirect()->route('user.cursos')
            ->with('success', "Has sido inscrito en: {$curso->nombre}");
    }
}
