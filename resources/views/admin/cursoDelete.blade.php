@php
    /** @var \App\Models\Curso $curso */
    
    // Mapeo de niveles para mostrar texto en lugar de números
    $nombresNiveles = [
        1 => 'Principiante',
        2 => 'Intermedio',
        3 => 'Avanzado'
    ];
@endphp

<x-layout>
    <x-slot:title>Eliminar Curso - {{ $curso->nombre }}</x-slot:title>

    @auth
    <main class="container mx-auto px-6 py-16">
        <div class="max-w-3xl mx-auto">

            {{-- Encabezado de Advertencia --}}
            <div class="text-center mb-12 animate-fade-in">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-red-50 rounded-full mb-6 text-red-500 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
                <h2 class="text-4xl font-serif text-slate-900 mb-4 tracking-tight">¿Confirmas la eliminación?</h2>
                <p class="text-slate-500 text-lg font-light">
                    Estás a punto de borrar permanentemente el curso: <br>
                    <span class="font-bold text-slate-800">"{{ $curso->nombre }}"</span>
                </p>
            </div>

            {{-- Card de Resumen (Previsualización) --}}
            <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl overflow-hidden mb-10 animate-fade-in delay-1">
                <div class="p-8 md:p-10">
                    <h3 class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 mb-6">Detalles del curso</h3>

                    <dl class="space-y-6">
                        {{-- Titulo --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Titulo</dt>
                            <dd class="md:col-span-2 text-slate-800 font-serif text-xl">{{ $curso->nombre }}</dd>
                        </div>

                        {{-- Info Técnica --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 border-t border-slate-50 pt-6">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Información</dt>
                            <dd class="md:col-span-2 text-slate-600 text-sm">
                                Nivel <span class="font-bold text-slate-800">{{ $nombresNiveles[$curso->nivel] ?? 'No definido' }}</span> 
                                — Duración: <span class="font-bold text-slate-800">{{ $curso->duracion }} min</span>
                            </dd>
                        </div>

                        {{-- Descripción --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 border-t border-slate-50 pt-6">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Descripción</dt>
                            <dd class="md:col-span-2 text-slate-500 text-sm leading-relaxed">{{ $curso->descripcion }}</dd>
                        </div>

                        {{-- Imagen --}}
                        @if($curso->imagen)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 border-t border-slate-50 pt-6">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Imagen de portada</dt>
                            <dd class="md:col-span-2">
                                <img src="{{ asset($curso->imagen) }}" class="h-24 w-40 object-cover rounded-2xl shadow-sm border border-slate-100">
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>

            {{-- Acciones Finales --}}
            <div class="flex flex-col md:flex-row items-center justify-center gap-6 animate-fade-in delay-2">
                {{-- Botón Eliminar --}}
                {{-- RECUERDA: method="POST" aquí es obligatorio para que el navegador no mande un GET --}}
            <form action="{{ route('curso.destroy', ['id' => $curso->id]) }}" method="POST">
                @csrf
                @method('DELETE') {{-- Esto es lo que busca Route::delete --}}
                
                <button type="submit" class="w-full md:w-auto bg-red-600 text-white px-10 py-5 rounded-full font-bold text-xs uppercase tracking-[0.2em] shadow-2xl shadow-red-200 hover:bg-red-700 hover:-translate-y-1 transition-all duration-300">
                    Sí, eliminar curso
                </button>
            </form>

                {{-- Botón Cancelar --}}
                <a href="{{ route('dashboard') }}"
                    class="text-xs font-bold uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-colors border-b-2 border-transparent hover:border-slate-200 pb-1">
                    No, volver al panel
                </a>
            </div>
        </div>
    </main>
    @endauth
</x-layout>