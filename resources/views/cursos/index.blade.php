<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 */
?>
@php
$nombresNiveles = [
1 => 'Principiante',
2 => 'Intermedio',
3 => 'Avanzado'
];
@endphp
<x-layout>
    <x-slot:title>Cursos Disponibles</x-slot:title>

    <div class="container mx-auto px-6 py-16 flex flex-col items-center">
        <div class="text-center mb-20 opacity-0 animate-fade-in transition-all duration-1000 ease-out"
            onmouseover="this.style.opacity='1'" {{-- Fallback simple para asegurar visibilidad --}}
            style="opacity: 1;">
            <span class="text-indigo-600 font-bold tracking-[0.3em] uppercase text-xs">Excelencia Académica</span>
            <h2 class="text-5xl md:text-6xl mt-4 mb-6 font-serif font-light text-slate-900 tracking-tight">
                Nuestros Cursos
            </h2>
            <div class="h-1 w-24 bg-indigo-600 mx-auto rounded-full"></div>
        </div>

        @php
        $misCursosIds = auth()->check() ? auth()->user()->cursos->pluck('id')->toArray() : [];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 w-full max-w-6xl">
            <!-- Container para o botão de pagamento -->

            @foreach ($cursos as $index => $curso)
            <div class="group flex flex-col bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl border border-slate-100 transition-all duration-500 ease-in-out transform hover:-translate-y-2">

                {{-- Contenedor de Imagen con Overlay --}}
                <div class="relative h-72 overflow-hidden">
                    <img
                        class="h-full w-full object-cover transition-transform duration-1000 group-hover:scale-110"
                        src="{{ asset($curso->imagen) }}"
                        alt="Imagen de {{ $curso->nombre }}">

                    {{-- Badge de Nivel Minimalista --}}
                    <div class="absolute top-6 left-6">
                        <span class="bg-slate-100 text-slate-500 text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-widest">
                            {{ $nombresNiveles[$curso->nivel] ?? 'Desconocido' }}
                        </span>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>

                {{-- Cuerpo de la Tarjeta --}}
                <div class="p-10 flex flex-col flex-grow">
                    <div class="flex flex-col gap-2 mb-6">
                        <div class="flex items-center gap-2 text-indigo-500 font-medium text-xs uppercase tracking-tighter">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $curso->duracion }} Horas de contenido
                        </div>
                        <h3 class="text-3xl font-serif text-slate-800 leading-snug">
                            {{ $curso->nombre }}
                        </h3>
                    </div>

                    <p class="text-slate-500 leading-relaxed mb-10 flex-grow font-light text-lg">
                        {{ \Illuminate\Support\Str::limit($curso->descripcion, 130) }}
                    </p>

                    {{-- Acciones con Lógica de Estado --}}
                    <div class="mt-auto border-t border-slate-50 pt-8">
                        @guest
                        @php
                            $planRoute = match((int) $curso->nivel) {
                                1 => 'planes.starter',
                                2 => 'planes.pro',
                                3 => 'planes.senior',
                                default => 'planes.starter',
                            };
                        @endphp
                        <a href="{{ route($planRoute) }}"
                            class="flex w-full items-center justify-center border-2 border-slate-900 py-4 rounded-full text-slate-900 font-bold text-xs uppercase tracking-[0.2em] transition-all duration-300 hover:bg-slate-900 hover:text-white group">
                            Explorar Curso
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        @endguest

                        @auth
                        @if (in_array($curso->id, $misCursosIds))
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-center gap-3 py-4 bg-slate-50 rounded-full border border-slate-100 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-xs uppercase tracking-widest font-bold">Ya eres miembro</span>
                            </div>
                            <a href="#" class="text-center text-xs font-semibold text-indigo-600 hover:text-indigo-800 transition-colors uppercase tracking-widest">
                                Ir a mi panel →
                            </a>
                        </div>
                        @else
                        <form action="{{ route('add.curso', $curso->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full bg-indigo-600 text-white py-5 rounded-full text-xs uppercase tracking-[0.2em] font-black shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:shadow-indigo-300 transform transition-all active:scale-95">
                                Agregar curso
                            </button>
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</x-layout>