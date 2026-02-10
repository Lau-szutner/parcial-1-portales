<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 */
?>

<x-layout>
    <x-slot:title>Artículos</x-slot:title>

    <div class="container mx-auto flex flex-col items-center">
        <h2 class="text-5xl my-10">Artículos</h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 w-full text-[var(--accent-color)] px-10 lg:px-0">
            @foreach ($articles as $article)
            <div class="flex flex-col bg-[var(--primary-color)] p-4 rounded-lg gap-5 h-full">

                <h3 class="text-3xl font-bold">{{ $article->title }}</h3>

                <p>Autor: {{ $article->author }}</p>
                <p>Nivel: {{ $article->nivel->name }}</p>

                <img
                    class="w-full aspect-video object-cover rounded-lg"
                    src="{{ $article->img }}"
                    alt="{{ $article->title }}">

                <p class="text-lg">
                    {{ $article->excerpt }}
                </p>

                <p class="bg-[var(--secondary-color)] text-2xl w-fit p-2 rounded-lg">
                    Categoría: {{ $article->category }}
                </p>

                <!-- Tópicos horizontales con wrap -->
                <div>
                    <p class="text-2xl font-bold mb-2">Tópicos:</p>
                    <ul class="flex flex-wrap gap-3">
                        @foreach ($article->topics as $topic)
                        <li class="bg-[var(--secondary-color)] px-3 py-2 rounded-lg whitespace-nowrap">
                            {{ $topic->name }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Botón siempre abajo -->
                <a
                    href="{{ route('articles.view', ['id' => $article->id]) }}"
                    class="mt-auto bg-[var(--secondary-color)] py-3 px-5 rounded-lg
                            inline-flex items-center justify-center
                            transition-all duration-300 ease-in-out
                            hover:bg-[var(--accent-color)]
                            hover:text-[var(--primary-color)]">
                    Leer
                </a>

            </div>
            @endforeach
        </div>
    </div>
</x-layout>