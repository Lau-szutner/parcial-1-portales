<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 */
?>

<x-layout>
    <x-slot:title>Cursos Disponibles</x-slot:title>

    <div class="container mx-auto px-4 flex flex-col items-center">
        <h2 class="text-5xl my-10 font-bold text-gray-800">Nuestros Cursos</h2>

        {{-- Lógica de optimización: obtenemos los IDs una sola vez --}}
        @php
        $misCursosIds = auth()->check()
        ? auth()->user()->cursos->pluck('id')->toArray()
        : [];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full mb-20">
            @foreach ($cursos as $curso)
            <div class="flex flex-col bg-[var(--primary-color)] p-6 rounded-xl shadow-lg border border-gray-100 transition-all hover:shadow-2xl">

                {{-- Encabezado y Título --}}
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-3xl font-bold text-[var(--accent-color)] leading-tight">
                        {{ $curso->nombre }}
                    </h3>

                </div>

                {{-- Imagen del Curso --}}
                <div class="relative overflow-hidden rounded-lg mb-5">
                    <img
                        class="h-72 w-full object-cover transition-transform duration-500 hover:scale-110"
                        src="{{ asset($curso->imagen) }}"
                        alt="Imagen de {{ $curso->nombre }}">
                </div>

                {{-- Detalles rápidos --}}
                <div class="flex gap-4 mb-4">
                    <p class="flex items-center text-sm font-medium text-white">
                        {{ $curso->duracion }} horas
                    </p>
                    <p class="bg-[var(--secondary-color)] text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        Nivel: {{ $curso->nivel }}
                    </p>
                </div>

                {{-- Descripción --}}
                <p class="text-white leading-relaxed mb-6 flex-grow">
                    {{ $curso->descripcion }}
                </p>

                {{-- SECCIÓN DE ACCIÓN (BOTONES) --}}
                <div class="mt-auto pt-4 border-t border-gray-100">
                    @guest
                    {{-- Caso: Visitante no logueado --}}
                    <a href="{{ route('login') }}?reason=adquirir"
                        class="w-full bg-[var(--secondary-color)] py-3 px-5 rounded-lg inline-flex items-center justify-center font-bold transition-all duration-300 hover:bg-[var(--accent-color)] hover:text-[var(--primary-color)] hover:scale-[1.02]">
                        Iniciar sesión para adquirir
                    </a>
                    @endguest

                    @auth
                    @if (in_array($curso->id, $misCursosIds))
                    {{-- Caso: El usuario ya posee el curso --}}
                    <div class="flex flex-col gap-2">
                        <button disabled
                            class="w-full bg-green-100 text-green-700 border-2 border-green-200 py-3 px-5 rounded-lg flex items-center justify-center gap-2 font-bold cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Ya lo tienes en tu cuenta
                        </button>
                        <a href="#" class="text-center text-sm text-blue-600 hover:underline">Ir al panel de estudio</a>
                    </div>
                    @else
                    {{-- Caso: El usuario está logueado pero no tiene el curso --}}
                    <form action="{{ route('user.cursos', $curso->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-[var(--secondary-color)] text-white py-3 px-5 rounded-lg font-bold transition-all duration-300 hover:bg-[var(--accent-color)] hover:text-[var(--primary-color)] active:scale-95 shadow-md">
                            Adquirir curso ahora
                        </button>
                    </form>
                    @endif
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>