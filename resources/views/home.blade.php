<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 */
?>

<x-layout class="font-serif">
    <x-slot:title>Home</x-slot:title>

    <section class="container mx-auto flex flex-col lg:flex-row m-5 lg:m-10 gap-8 items-center">
        <div class="w-full lg:w-7/12">
            <img src="{{ asset('images/home-01.webp') }}"
                alt="Persona trabajando en una computadora con código en pantalla, usando auriculares en un entorno de trabajo nocturno" "
                class=" rounded-lg w-full h-auto">
        </div>

        <div class="flex flex-col items-center lg:items-start justify-center w-full lg:w-7/12 gap-6 text-center lg:text-left">
            <h2 class="font-bold text-3xl lg:text-4xl">
                Bienvenidos a Clauty
            </h2>
            <p class="text-base lg:text-lg">
                Tu espacio para aprender y crecer. Aquí encontrarás una variedad de cursos y artículos diseñados para
                ayudarte a desarrollar nuevas habilidades y profundizar en tus conocimientos. Ya sea que estés
                buscando aprender algo nuevo o mejorar lo que ya sabes, Clauty es el lugar ideal para tu crecimiento
                personal y profesional. ¡Explora nuestros contenidos y comienza tu camino hacia el éxito hoy mismo!
            </p>
        </div>
    </section>

    <section class="mx-auto bg-[var(--primary-color)] flex flex-col items-center py-10 px-4">
        <h2 class="text-2xl sm:text-3xl lg:text-4xl text-[var(--accent-color)] text-center">
            Los mejores cursos por profesionales
        </h2>

        <div class="container mx-auto flex flex-col md:flex-row gap-6 justify-center py-10">
            <img src="{{ asset('/images/cursos/javascript.png') }}"
                alt="Curso introductorio de JavaScript para desarrollo web"
                class="rounded-lg w-full md:w-1/3">

            <img src="{{ asset('/images/cursos/laravel.png') }}"
                alt="Curso de Laravel para desarrollo de aplicaciones web con PHP"
                class="rounded-lg w-full md:w-1/3">

            <img src="{{ asset('/images/cursos/php.png') }}"
                alt="Curso de PHP para programación backend y desarrollo web"
                class="rounded-lg w-full md:w-1/3">
        </div>

        <div class="bg-[var(--secondary-color)] py-2 px-6 rounded-xl text-white">
            <x-nav-link route="cursos.index">Cursos</x-nav-link>
        </div>
    </section>


    <section class="container mx-auto flex flex-col items-center px-4">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl my-10 text-center">
            Los mejores artículos de la web
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full">
            @foreach ($articles as $article)
            <div class="bg-[var(--primary-color)] p-4 rounded-lg text-[var(--accent-color)] flex flex-col gap-5">
                <h3 class="text-xl lg:text-2xl font-bold">
                    {{ $article->title }}
                </h3>

                <p class="text-sm lg:text-base">
                    <strong>Autor:</strong> {{ $article->author }}
                </p>

                <img src="{{ $article->img }}"
                    alt="{{ $article->title }}"
                    class="w-full h-48 object-cover rounded-lg">

                <p class="text-sm lg:text-base">
                    {{ $article->excerpt }}
                </p>

                <div class="mt-auto">
                    <p class="mb-2 text-sm">
                        <strong>Categoría:</strong> {{ $article->category }}
                    </p>

                    <a href="{{ route('articles.view', ['id' => $article->id]) }}"
                        class="block bg-[var(--secondary-color)] h-10 rounded-lg w-full text-white flex items-center justify-center hover:scale-105 transition">
                        Leer
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>


</x-layout>