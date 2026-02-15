<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 */
?>

<x-layout>
    <x-slot:title>Home</x-slot:title>

    {{-- SECCIÓN HERO: Bienvenida con impacto visual --}}
    <section class="relative overflow-hidden bg-white py-20 lg:py-32">
        <div class="container mx-auto px-6 flex flex-col lg:flex-row gap-16 items-center">
            {{-- Texto Hero --}}
            <div class="w-full lg:w-1/2 flex flex-col items-center lg:items-start text-center lg:text-left animate-fade-in">
                <span class="text-indigo-600 font-bold tracking-[0.3em] uppercase text-xs mb-4">Plataforma de Aprendizaje</span>
                <h2 class="font-serif text-5xl lg:text-7xl text-slate-900 leading-[1.1] mb-8 tracking-tighter">
                    Bienvenidos a <span class="text-indigo-600">Clauty</span>
                </h2>
                <p class="text-lg lg:text-xl text-slate-500 leading-relaxed max-w-xl mb-10 font-light">
                    Tu espacio para aprender y crecer. Descubre cursos diseñados por expertos y artículos que profundizan en las tecnologías que mueven el mundo hoy.
                </p>
                <div class="flex gap-4">
                    <a href="#cursos" class="bg-slate-900 text-white px-8 py-4 rounded-full font-bold text-xs uppercase tracking-widest hover:bg-indigo-600 transition-all shadow-xl hover:shadow-indigo-200">
                        Comenzar ahora
                    </a>
                </div>
            </div>
            <!-- Container para o botão de pagamento -->

            {{-- Imagen Hero con efecto de profundidad --}}
            <div class="w-full lg:w-1/2 relative group">
                <div class="absolute -inset-4 bg-indigo-100/50 rounded-[2rem] blur-2xl group-hover:bg-indigo-200/50 transition-colors duration-500"></div>
                <img src="{{ asset('images/home-01.webp') }}"
                    alt="Espacio de trabajo"
                    class="relative rounded-3xl shadow-2xl w-full h-[450px] object-cover transition-transform duration-700 group-hover:scale-[1.02]">
            </div>
        </div>
    </section>

    {{-- SECCIÓN CURSOS: Galería Destacada --}}
    <section id="cursos" class="bg-slate-900 py-24 px-6 overflow-hidden">
        <div class="container mx-auto text-center mb-16">
            <span class="text-indigo-400 font-bold tracking-[0.3em] uppercase text-[10px]">Formación Profesional</span>
            <h2 class="font-serif text-4xl lg:text-5xl text-white mt-4 mb-4">Excelencia Académica</h2>
            <div class="h-1 w-20 bg-indigo-500 mx-auto rounded-full mb-6"></div>
            <p class="text-slate-400 font-light tracking-wide text-lg max-w-2xl mx-auto">
                Aprende con los mejores cursos dictados por expertos de la industria.
            </p>
        </div>

        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 mb-20">
            @php
            $destacados = [
            ['img' => 'javascript.png', 'name' => 'JavaScript'],
            ['img' => 'laravel.png', 'name' => 'Laravel'],
            ['img' => 'php.png', 'name' => 'PHP']
            ];
            @endphp

            @foreach($destacados as $item)
            <a href="{{ route('cursos.index') }}" class="group relative block bg-slate-800 rounded-2xl border border-white/5 overflow-hidden transition-all duration-500 hover:border-indigo-500/50 hover:shadow-[0_0_30px_-10px_rgba(99,102,241,0.3)]">
                {{-- Contenedor de Imagen Horizontal (16:9) --}}
                <div class="aspect-video overflow-hidden">
                    <img src="{{ asset('/images/cursos/' . $item['img']) }}"
                        alt="Curso de {{ $item['name'] }}"
                        class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-700">

                    {{-- Overlay Gradiente --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-60 group-hover:opacity-40 transition-opacity"></div>
                </div>

                {{-- Texto flotante sobre la imagen --}}
                <div class="absolute bottom-0 left-0 p-6 w-full">
                    <p class="text-white font-serif text-xl tracking-wide group-hover:translate-x-2 transition-transform duration-300">
                        {{ $item['name'] }}
                    </p>
                    <p class="text-indigo-400 text-[10px] font-bold uppercase tracking-widest mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-2 group-hover:translate-y-0">
                        Ver programa completo →
                    </p>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Botón de Acción Principal --}}
        <div class="flex justify-center">
            <a href="{{ route('cursos.index') }}"
                class="group relative inline-flex items-center gap-4 bg-indigo-600 text-white px-12 py-5 rounded-full text-xs font-bold uppercase tracking-[0.2em] shadow-2xl shadow-indigo-500/20 hover:bg-indigo-500 hover:-translate-y-1 transition-all duration-300">
                Explorar todos los cursos
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
    </section>

    {{-- SECCIÓN ARTÍCULOS: Estilo Editorial --}}
    <section class="container mx-auto py-24 px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-4">
            <div class="max-w-xl text-left">
                <h2 class="font-serif text-4xl lg:text-6xl text-slate-900 mb-4">El Blog</h2>
                <p class="text-slate-500 text-lg font-light">Perspectivas, tutoriales y las últimas novedades del mundo tech.</p>
            </div>
            <x-nav-link route="articulos.index" class="text-indigo-600 font-bold text-xs uppercase tracking-widest border-b-2 border-indigo-100 hover:border-indigo-600 transition-all pb-1">
                Leer todos los artículos
            </x-nav-link>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach ($articles as $index => $article)
            <article class="group flex flex-col bg-white border border-slate-200 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 animate-fade-in">

                {{-- Imagen del Artículo con borde inferior sutil --}}
                <div class="relative overflow-hidden aspect-video border-b border-slate-100">
                    <img src="{{ $article->img }}"
                        alt="{{ $article->title }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                    <div class="absolute top-4 left-4">
                        <span class="bg-indigo-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">
                            {{ $article->category }}
                        </span>
                    </div>
                </div>

                {{-- Contenido del Artículo con Padding --}}
                <div class="p-8 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 text-slate-400 text-[10px] mb-4 font-bold uppercase tracking-[0.2em]">
                        <span>Por {{ $article->author }}</span>
                        <span class="h-1 w-1 bg-indigo-400 rounded-full"></span>
                        <span>5 min lectura</span>
                    </div>

                    <h3 class="text-2xl font-serif text-slate-800 mb-4 group-hover:text-indigo-600 transition-colors leading-tight">
                        {{ $article->title }}
                    </h3>

                    <p class="text-slate-500 leading-relaxed mb-8 font-light line-clamp-3 text-sm">
                        {{ $article->excerpt }}
                    </p>

                    {{-- Enlace inferior estilizado --}}
                    <a href="{{ route('articles.view', ['id' => $article->id]) }}"
                        class="mt-auto pt-6 border-t border-slate-50 inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-slate-900 group-hover:text-indigo-600 transition-all duration-300">
                        <span>Continuar leyendo</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </section>
</x-layout>