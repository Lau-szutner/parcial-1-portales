<?php

/** @var \App\Models\articles $article */
/** @var \App\Models\cursos $curso */
?>

<x-layout>
    <x-slot:title>Admin Panel</x-slot:title>

    <div class="container mx-auto px-6 py-12">
        @auth
        {{-- SECCIÓN ARTÍCULOS --}}
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4 animate-fade-in">
            <div>
                <span class="text-indigo-600 font-bold tracking-[0.2em] uppercase text-[10px]">Gestión de Contenido</span>
                <h2 class="text-4xl font-serif text-slate-900 mt-2">Artículos</h2>
            </div>
            <a href="{{ route('create') }}"
                class="bg-slate-900 text-white px-6 py-3 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-indigo-600 transition-all shadow-lg shadow-slate-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Publicar nuevo
            </a>
        </div>

        <section class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden mb-20 animate-fade-in delay-1">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Info Principal</th>
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Metadatos</th>
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Nivel/Tópicos</th>
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($articles as $article)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            {{-- Info Principal: ID, Título, Imagen --}}
                            <td class="px-6 py-6">
                                <div class="flex items-center gap-4">
                                    <span class="text-xs font-mono text-slate-300">#{{ $article->id }}</span>
                                    <img src="{{ asset($article->img) }}" alt="" class="h-12 w-20 object-cover rounded-lg shadow-sm border border-slate-100">
                                    <div class="max-w-[200px]">
                                        <p class="text-sm font-bold text-slate-800 truncate">{{ $article->title }}</p>
                                        <p class="text-[10px] text-slate-400 line-clamp-1 italic">{{ $article->excerpt }}</p>
                                    </div>
                                </div>
                            </td>
                            {{-- Metadatos: Autor, Tiempo, Categoría --}}
                            <td class="px-6 py-6">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs font-medium text-slate-700">✍️ {{ $article->author }}</span>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-tighter">📁 {{ $article->category }}</span>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-tighter">⏱️ {{ $article->time }} min</span>
                                </div>
                            </td>
                            {{-- Nivel y Tópicos --}}
                            <td class="px-6 py-6">
                                <span class="inline-block px-2 py-1 rounded-md bg-indigo-50 text-indigo-600 text-[10px] font-bold uppercase mb-2">
                                    {{ $article->nivel->name }}
                                </span>
                                <div class="flex flex-wrap gap-1">
                                    @foreach ($article->topics as $topic)
                                    <span class="text-[9px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded">#{{ $topic->name }}</span>
                                    @endforeach
                                </div>
                            </td>
                            {{-- Acciones --}}
                            <td class="px-6 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('article.delete', ['id' => $article->id]) }}"
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
        @endauth

    {{-- SECCIÓN ARTÍCULOS --}}
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4 animate-fade-in">
            <div>
                <h2 class="text-4xl font-serif text-slate-900 mt-2">Cursos</h2>
            </div>
            <a href="{{ route('create') }}"
                class="bg-slate-900 text-white px-6 py-3 rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-indigo-600 transition-all shadow-lg shadow-slate-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Publicar nuevo CURSO
            </a>
        </div>

        <section class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden mb-20 animate-fade-in delay-1">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Info Principal</th>
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Metadatos</th>
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Nivel/Tópicos</th>
                            <th class="px-6 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($cursos as $curso)
                        <tr class="hover:bg-slate-50/50 transition-colors group">
                            {{-- Info Principal: ID, Título, Imagen --}}
                            <td class="px-6 py-6">
                                <div class="flex items-center gap-4">
                                    <span class="text-xs font-mono text-slate-300">#{{ $curso->id }}</span>
                                    <img src="{{ asset($curso->imagen) }}" alt="" class="h-12 w-20 object-cover rounded-lg shadow-sm border border-slate-100">
                                    <div class="max-w-[200px]">
                                        <p class="text-sm font-bold text-slate-800 truncate">{{ $curso->nombre }}</p>
                                        <p class="text-[10px] text-slate-400 line-clamp-1 italic">{{ $curso->descripcion }}</p>
                                    </div>
                                </div>
                            </td>
                                {{-- Metadatos: Autor, Tiempo, Categoría --}}
                            <td class="px-6 py-6">
                                <div class="flex flex-col gap-1">
                                    <span class="text-xs font-medium text-slate-700">✍️ {{ "Lautaro Fernandez Szutner" }}</span>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-tighter">📁 {{"MODIFICAR, NO TENEMOS CATEGORIAS"}}</span>
                                    <span class="text-[10px] text-slate-400 uppercase tracking-tighter">⏱️ {{ $curso->duracion }} min</span>
                                </div>
                            </td>
                            {{-- Nivel y Tópicos --}}
                            <td class="px-6 py-6">
                                <span class="inline-block px-2 py-1 rounded-md bg-indigo-50 text-indigo-600 text-[10px] font-bold uppercase mb-2">
                                    {{ $curso->nivel }}
                                </span>
                            </td>
                            <!--{{-- Acciones --}}
                            <td class="px-6 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                        class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('article.delete', ['id' => $article->id]) }}"
                                        class="p-2 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </div>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>


        {{-- SECCIÓN USUARIOS --}}
        <div class="mb-10 animate-fade-in">
            <span class="text-indigo-600 font-bold tracking-[0.2em] uppercase text-[10px]">Control de Usuarios</span>
            <h2 class="text-4xl font-serif text-slate-900 mt-2">Usuarios y sus Cursos</h2>
        </div>

        <section class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden animate-fade-in delay-2">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Perfil Usuario</th>
                            <th class="px-8 py-4 text-[10px] uppercase tracking-widest text-slate-400 font-black">Cursos Inscritos</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach ($users as $user)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-xs">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-800">{{ $user->name }}</p>
                                        <p class="text-xs text-slate-400">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                @if ($user->cursos->isNotEmpty())
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($user->cursos as $curso)
                                    <span class="px-3 py-1 bg-emerald-50 text-emerald-700 text-[10px] font-bold rounded-full border border-emerald-100">
                                        {{ $curso->nombre }}
                                    </span>
                                    @endforeach
                                </div>
                                @else
                                <span class="text-xs text-slate-300 italic">Sin cursos activos</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</x-layout>