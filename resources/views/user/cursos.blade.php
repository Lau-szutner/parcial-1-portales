<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 * @var string $usuario
 */
?>

<x-layout>
    <x-slot:title>Mi Aprendizaje - {{ $usuario }}</x-slot:title>

    <main class="container mx-auto px-6 py-16">

        {{-- SECCIÓN PERFIL DE USUARIO --}}
        @auth
        <div class="max-w-4xl mx-auto mb-20 animate-fade-in">
            <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-2xl shadow-slate-200/50 overflow-hidden">
                {{-- Header del Perfil con gradiente sutil --}}
                <div class="bg-gradient-to-r from-slate-900 to-indigo-900 px-8 py-10 md:px-12 flex flex-col md:flex-row items-center gap-6">
                    <div class="h-24 w-24 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white text-3xl font-serif">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-serif text-white">{{ auth()->user()->name }}</h3>
                        <p class="text-indigo-200 text-sm font-light italic">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="md:ml-auto">
                        <span class="px-4 py-2 bg-indigo-500/20 border border-indigo-400/30 text-indigo-100 rounded-full text-[10px] font-black uppercase tracking-[0.2em]">
                            {{ auth()->user()->rol === 'student' ? 'Estudiante' : 'Administrador' }}
                        </span>
                    </div>
                </div>

                {{-- Detalles rápidos --}}
                <div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-slate-50">
                    <div class="p-8 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">Cursos Activos</p>
                        <p class="text-2xl font-serif text-slate-800">{{ $cursos->count() }}</p>
                    </div>
                    <div class="p-8 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">Miembro desde</p>
                        <p class="text-2xl font-serif text-slate-800">{{ auth()->user()->created_at->format('M Y') }}</p>
                    </div>
                    <div class="p-8 text-center">
                        <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">Estado de Cuenta</p>
                        <p class="text-2xl font-serif text-emerald-500 italic text-sm">✓ Verificada</p>
                    </div>
                </div>
            </div>
        </div>
        @endauth

        {{-- SECCIÓN GRID DE CURSOS --}}
        <div class="max-w-7xl mx-auto">
            <div class="flex items-end justify-between mb-12 px-2 animate-fade-in delay-1">
                <div>
                    <span class="text-indigo-600 font-bold tracking-[0.3em] uppercase text-[10px]">Tu Catálogo Personal</span>
                    <h2 class="text-4xl md:text-5xl font-serif text-slate-900 mt-2">Cursos Adquiridos</h2>
                </div>
                <div class="hidden md:block h-px flex-grow mx-10 bg-slate-100"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 animate-fade-in delay-2">
                @foreach ($cursos as $curso)
                <div class="group bg-white border border-slate-100 rounded-[2rem] overflow-hidden flex flex-col md:flex-row shadow-sm hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">

                    {{-- Imagen del Curso --}}
                    <div class="md:w-2/5 relative overflow-hidden">
                        <img src="{{ asset($curso->imagen) }}"
                            alt="{{ $curso->nombre }}"
                            class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors"></div>
                    </div>

                    {{-- Contenido del Curso --}}
                    <div class="md:w-3/5 p-8 flex flex-col">
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-slate-100 text-slate-500 text-[9px] font-black px-3 py-1 rounded-full uppercase tracking-widest">
                                {{ $curso->nivel }}
                            </span>
                            <span class="text-slate-400 text-[10px] font-medium flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $curso->duracion }}h
                            </span>
                        </div>

                        <h3 class="text-2xl font-serif text-slate-800 mb-4 group-hover:text-indigo-600 transition-colors leading-tight">
                            {{ $curso->nombre }}
                        </h3>

                        <p class="text-slate-500 text-sm leading-relaxed mb-8 line-clamp-2 italic">
                            {{ $curso->descripcion }}
                        </p>

                        {{-- Botón de Acción --}}
                        <div class="mt-auto">
                            <a href="#" class="inline-flex items-center justify-center w-full bg-slate-900 text-white py-4 rounded-xl text-[10px] font-bold uppercase tracking-[0.2em] transition-all hover:bg-indigo-600 hover:shadow-lg hover:shadow-indigo-100 group/btn">
                                Continuar aprendiendo
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 transform group-hover/btn:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Empty State (si no tiene cursos) --}}
            @if($cursos->isEmpty())
            <div class="text-center py-20 bg-slate-50 rounded-[3rem] border-2 border-dashed border-slate-200">
                <p class="text-slate-400 font-serif text-xl italic">Aún no has comenzado ninguna aventura...</p>
                <a href="{{ route('cursos.index') }}" class="mt-6 inline-block text-indigo-600 font-bold uppercase tracking-widest text-xs hover:text-indigo-800">Explorar catálogo →</a>
            </div>
            @endif
        </div>
    </main>
</x-layout>