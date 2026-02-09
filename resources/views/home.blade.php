<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 */
?>

<x-layout class="font-serif">
    <x-slot:title>Home</x-slot:title>


    <section class="container mx-auto flex m-10 gap-5">
        <div>
            <img src="{{ asset('images/home-01.webp') }}" alt="Descripción de la imagen" class="rounded-lg">
        </div>
        <div class="flex flex-col items-center justify-center w-9/12 gap-10">
            <h2 class="font-bold text-4xl">Bienvenidos a Clauty</h2>
            <p>Tu espacio para aprender y crecer. Aquí encontrarás una variedad de cursos y artículos diseñados para
                ayudarte a desarrollar nuevas habilidades y profundizar en tus conocimientos. Ya sea que estés
                buscando aprender algo nuevo o mejorar lo que ya sabes, Clauty es el lugar ideal para tu crecimiento
                personal y profesional. ¡Explora nuestros contenidos y comienza tu camino hacia el éxito hoy mismo!
            </p>

        </div>
    </section>
    <section class="mx-auto bg-[var(--primary-color)] flex flex-col items-center py-10">
        <h2 class="text-4xl text-[var(--accent-color)]">Los mejores cursos por profesionales</h2>
        <div class="container mx-auto flex gap-5 flex-row justify-center py-10">
            <img src="{{ asset('/images/cursos/javascript.png') }}" alt="Curso de javascript"
                class="rounded-lg w-4/12">
            <img src="{{ asset('/images/cursos/laravel.png') }}" alt="Curso de laravel" class="rounded-lg w-4/12">
            <img src="{{ asset('/images/cursos/php.png') }}" alt="Curso de php" class="rounded-lg w-4/12">
        </div>

        <div class="bg-[var(--secondary-color)] py-2 px-6 rounded-xl text-white">
            <x-nav-link route="cursos.index">Cursos</x-nav-link>
        </div>





    </section>
    <section class="container mx-auto flex flex-col items-center">
        <h2 class="text-5xl my-10">Los mejores articulos de la web</h2>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($articles as $article)
            <div class="grid gap-5 bg-[var(--primary-color)] p-4 rounded-lg gap-5 text-[var(--accent-color)]">
                <h2 class="text-2xl"><strong>{{ $article->title }}</strong></h2>

                <div class="flex flex-col justify-between">
                    <p><strong>Autor: </strong> {{ $article->author }}</p>

                    <img src="{{ $article->img }}" alt=" {{ $article->title }}"
                        class="w-full h-auto rounded-lg">
                    <p>{{ $article->excerpt }}</p>

                    <div class="mt-5 w-100">
                        <p><strong class="text-bold">Categoria: </strong>{{ $article->category }}</p>
                        <div class="bg-[var(--secondary-color)] h-10 rounded-lg w-full hover:scale-105">
                            <a
                                href="{{ route('articles.view', ['id' => $article->id]) }}"
                                class="flex items-center justify-center w-full h-full text-white">
                                Leer
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            @endforeach
        </div>

    </section>

</x-layout>