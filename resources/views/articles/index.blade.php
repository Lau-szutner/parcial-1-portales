<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 */
?>

<x-layout>
    <x-slot:title>Artículos</x-slot:title>

    <div class="container mx-auto px-6 py-16 flex flex-col items-center">
        <div class="text-center mb-16 animate-fade-in">
            <span class="text-indigo-600 font-bold tracking-[0.3em] uppercase text-xs">Blog & Recursos</span>
            <h2 class="text-5xl md:text-6xl mt-4 mb-6 font-serif font-light text-slate-900 tracking-tight">Artículos</h2>
            <div class="h-1 w-24 bg-indigo-600 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 w-full max-w-7xl">
            @foreach ($articles as $index => $article)
            <article class="group flex flex-col bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 animate-fade-in">

                {{-- Contenedor de Imagen con Aspect Ratio Horizontal --}}
                <div class=" relative overflow-hidden aspect-video border-b border-slate-100">
                    <img
                        class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110"
                        src="{{ $article->img }}"
                        alt="{{ $article->title }}">

                    {{-- Badge de Categoría Flotante --}}
                    <div class="absolute top-6 left-6">
                        <span class="bg-indigo-600 text-white text-[10px] font-black px-4 py-2 rounded-full uppercase tracking-widest shadow-lg shadow-indigo-500/30">
                            {{ $article->category }}
                        </span>
                    </div>
                </div>

                {{-- Cuerpo del Artículo --}}
                <div class="p-8 md:p-10 flex flex-col flex-grow">

                    {{-- Meta Información --}}
                    <div class="flex flex-wrap items-center gap-4 text-slate-400 text-[10px] mb-6 font-bold uppercase tracking-[0.2em]">
                        <div class="flex items-center gap-2">
                            <span class="text-indigo-500">Autor:</span>
                            <span class="text-slate-700">{{ $article->author }}</span>
                        </div>
                        <span class="h-1 w-1 bg-slate-300 rounded-full hidden md:block"></span>
                        <div class="flex items-center gap-2">
                            <span class="text-indigo-500">Nivel:</span>
                            <span class="bg-slate-100 text-slate-600 px-2 py-0.5 rounded italic">{{ $article->nivel->name }}</span>
                        </div>
                    </div>

                    <h3 class="text-3xl font-serif text-slate-800 mb-6 group-hover:text-indigo-600 transition-colors leading-tight">
                        {{ $article->title }}
                    </h3>

                    <p class="text-slate-500 leading-relaxed mb-8 font-light text-lg line-clamp-3">
                        {{ $article->excerpt }}
                    </p>

                    {{-- Tópicos (Tags) --}}
                    <div class="mb-10">
                        <p class="text-[10px] uppercase tracking-widest font-black text-slate-400 mb-4">Temas tratados:</p>
                        <ul class="flex flex-wrap gap-2">
                            @foreach ($article->topics as $topic)
                            <li class="bg-slate-50 border border-slate-200 text-slate-600 px-3 py-1.5 rounded-lg text-xs font-medium hover:bg-indigo-50 hover:border-indigo-200 hover:text-indigo-600 transition-colors cursor-default">
                                #{{ $topic->name }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-auto pt-8 border-t border-slate-50">
                        <a href="{{ route('articles.view', ['id' => $article->id]) }}"
                            class="flex w-full items-center justify-center bg-slate-900 py-5 rounded-2xl text-white font-bold text-xs uppercase tracking-[0.2em] transition-all duration-300 hover:bg-indigo-600 hover:shadow-xl hover:shadow-indigo-200 group/btn">
                            Leer artículo completo
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-3 transform group-hover/btn:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</x-layout>