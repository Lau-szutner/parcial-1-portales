<?php

/**
 * @var \App\Models\Article $article
 * @var string $htmlContent  // Asegúrate de recibir el contenido HTML en la vista
 */
?>

<x-layout>
    <x-slot:title>Artículos - {{ $article->id }}</x-slot:title>
    <main class="container mx-auto flex flex-col items-center">
        <article class="border-2 border-[var(--primary-color)]  my-10 p-10 rounded-xl">
            <h2 class="text-5xl my-10">{{ $article->title }}</h2>
            <p class="text-2xl ">Autor: {{ $article->author }}</p>

            <div class="flex w-full">
                <div class="prose mt-5 ">
                    {{ $article->body }}
                </div>
                <img class="h-72 rounded-lg place-self-center " src="../{{ $article->img }}" alt="{{ $article->title }}">
            </div>
            <p class="bg-[var(--secondary-color)] w-fit p-2 rounded-lg">Categoría: {{ $article->category }}</p>
        </article>
    </main>
</x-layout>