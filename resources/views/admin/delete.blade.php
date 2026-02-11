<?php

/** @var \App\Models\articles $article */
?>

<x-layout>
    <x-slot:title>Eliminar Artículo - {{ $article->title }}</x-slot:title>

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
                    Estás a punto de borrar permanentemente el artículo: <br>
                    <span class="font-bold text-slate-800">"{{ $article->title }}"</span>
                </p>
            </div>

            {{-- Card de Resumen (Previsualización) --}}
            <div class="bg-white border border-slate-100 rounded-[2.5rem] shadow-xl overflow-hidden mb-10 animate-fade-in delay-1">
                <div class="p-8 md:p-10">
                    <h3 class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 mb-6">Resumen del registro</h3>

                    <dl class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Título</dt>
                            <dd class="md:col-span-2 text-slate-800 font-serif text-xl">{{ $article->title }}</dd>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 border-t border-slate-50 pt-6">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Meta</dt>
                            <dd class="md:col-span-2 text-slate-600 text-sm italic">
                                Escrito por <span class="font-bold text-slate-800">{{ $article->author }}</span> en la categoría <span class="font-bold text-slate-800">{{ $article->category }}</span>
                            </dd>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 border-t border-slate-50 pt-6">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Resumen (Excerpt)</dt>
                            <dd class="md:col-span-2 text-slate-500 text-sm leading-relaxed">{{ $article->excerpt }}</dd>
                        </div>

                        @if($article->img)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 border-t border-slate-50 pt-6">
                            <dt class="text-xs font-bold text-slate-400 uppercase tracking-widest">Miniatura</dt>
                            <dd class="md:col-span-2">
                                <img src="{{ asset($article->img) }}" class="h-24 w-40 object-cover rounded-2xl shadow-sm border border-slate-100">
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>

            {{-- Acciones Finales --}}
            <div class="flex flex-col md:flex-row items-center justify-center gap-6 animate-fade-in delay-2">
                {{-- Botón Eliminar --}}
                <form action="{{ route('article.destroy', ['id' => $article->id]) }}" method="post" class="w-full md:w-auto">
                    @csrf
                    <button type="submit"
                        class="w-full md:w-auto bg-red-600 text-white px-10 py-5 rounded-full font-bold text-xs uppercase tracking-[0.2em] shadow-2xl shadow-red-200 hover:bg-red-700 hover:-translate-y-1 transition-all duration-300">
                        Sí, eliminar permanentemente
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