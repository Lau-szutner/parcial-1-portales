<?php

/**
 * @var \App\Models\Article $article
 * @var string $htmlContent
 */
?>

<x-layout>
    <x-slot:title>Artículos - {{ $article->title }}</x-slot:title>

    <main class="bg-white min-h-screen">
        {{-- Header del Artículo: Título y Meta --}}
        <header class="container mx-auto max-w-4xl pt-20 pb-10 px-6 text-center animate-fade-in">
            <div class="flex items-center justify-center gap-3 mb-6">
                <span class="bg-indigo-50 text-indigo-600 text-[10px] font-bold px-4 py-1.5 rounded-full uppercase tracking-[0.2em]">
                    {{ $article->category }}
                </span>
                <span class="text-slate-300">•</span>
                <span class="text-slate-500 text-xs font-medium uppercase tracking-widest">5 min de lectura</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-serif text-slate-900 leading-tight mb-8 tracking-tighter">
                {{ $article->title }}
            </h1>

            <div class="flex items-center justify-center gap-4">
                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-sm shadow-sm">
                    {{ substr($article->author, 0, 1) }}
                </div>
                <div class="text-left">
                    <p class="text-xs text-slate-400 uppercase tracking-widest font-bold leading-none">Escrito por</p>
                    <p class="text-slate-800 font-medium">{{ $article->author }}</p>
                </div>
            </div>
        </header>

        {{-- Imagen Destacada de Gran Formato --}}
        <div class="container mx-auto max-w-6xl px-6 mb-16 animate-fade-in delay-1">
            <div class="relative h-[300px] md:h-[500px] overflow-hidden rounded-[2rem] shadow-2xl">
                <img class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-1000"
                    src="../{{ $article->img }}"
                    alt="{{ $article->title }}">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900/20"></div>
            </div>
        </div>

        {{-- Contenido del Artículo --}}
        <div class="container mx-auto max-w-3xl px-6 pb-24">
            <div class="prose prose-lg prose-slate max-w-none 
                        prose-headings:font-serif prose-headings:font-light prose-headings:tracking-tight
                        prose-p:text-slate-600 prose-p:leading-relaxed prose-p:text-xl
                        prose-strong:text-slate-900 prose-strong:font-bold
                        prose-img:rounded-2xl prose-img:shadow-lg
                        animate-fade-in delay-2">

                {{-- Aquí se renderiza el contenido --}}
                {!! $article->body !!}

            </div>

            {{-- Footer del Artículo: Tópicos y Acciones --}}
            <footer class="mt-20 pt-10 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="flex flex-wrap gap-2">
                    @foreach($article->topics as $topic)
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest bg-slate-50 px-4 py-2 rounded-lg">
                        #{{ $topic->name }}
                    </span>
                    @endforeach
                </div>

                <a href="{{ route('articulos.index') }}"
                    class="inline-flex items-center gap-2 text-indigo-600 font-bold text-xs uppercase tracking-widest group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Volver a los artículos
                </a>
            </footer>
        </div>
    </main>
</x-layout>