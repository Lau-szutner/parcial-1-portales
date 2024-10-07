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
            <h1 class="text-5xl my-10">{{ $article->title }}</h1>
            <p class="text-2xl ">Autor: {{ $article->author }}</p>

            <div class="flex w-full">
                <div class="prose mt-5 ">
                    {!! $htmlContent !!}
                </div>
                <img class="h-72 rounded-lg place-self-center " src="../{{ $article->img }}"
                    alt="Imagen del artículo {{ $article->title }}" class="w-full h-auto rounded-lg">

                <!-- Mostrar el contenido HTML convertido aquí -->
            </div>
            <p class="bg-[var(--secondary-color)] w-fit p-2 rounded-lg">Categoría: {{ $article->category }}</p>

            <div class="grid grid-cols-2 gap-4 w-full text-[var(--accent-color)]">
                <!-- Puedes agregar más contenido aquí si es necesario -->
            </div>
        </article>

    </main>
</x-layout>
