<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 */
?>
<x-layout>


    <x-slot:title>Cursos</x-slot:title>

    <div class="container mx-auto flex flex-col items-center">
        <h2 class="text-5xl my-10 ">Cursos</h2>

        @auth
        <pre class="bg-gray-800 text-green-400 p-4 rounded-lg overflow-auto text-xs h-fit">
        {{ json_encode(auth()->user()->cursos, JSON_PRETTY_PRINT) }}
        </pre>
        @endauth



        <div class="grid grid-cols-2 gap-4 w-full text-[var(--accent-color)]">
            @foreach ($cursos as $curso)
            <!-- Cambié $articles a $cursos -->
            <div class="grid bg-[var(--primary-color)] p-4 rounded-lg gap-5">
                <h2 class="text-3xl font-bold">{{ $curso->nombre }}</h2> <!-- Cambié a nombre -->
                <p>Duración: {{ $curso->duracion }} horas</p> <!-- Agregué duración -->
                <img class="h-72 rounded-lg place-self-center" src="{{ $curso->imagen }}" alt="{{ $curso->nombre }}"
                    class="w-full h-auto rounded-lg">
                <p class="text-lg">
                    {{ $curso->descripcion }} <!-- Cambié excerpt a descripción -->
                </p>

                <p class="bg-[var(--secondary-color)] w-fit p-2 rounded-lg">Nivel: {{ $curso->nivel }}</p>
                <!-- Cambié category a nivel -->

                @guest
                <a
                    href="/login"
                    class="bg-[var(--secondary-color)] py-3 px-5 rounded-lg
                    inline-flex items-center justify-center
                    transition-all duration-300 ease-in-out
                    hover:bg-[var(--accent-color)]
                    hover:text-[var(--primary-color)]
                    hover:scale-105">
                    Adquirir
                </a>
                @endguest

                {{-- <!-- Formulario para adquirir un curso -->
                    <form action="{{ route('cursos.adquirir', $curso) }}" method="POST">
                @csrf
                <button type="submit"
                    class="bg-[var(--secondary-color)] py-3 px-5 rounded-lg hover:bg-[var(--accent-color)] ease-in-out duration-300 hover:text-[var(--primary-color)]">
                    Adquirir
                </button>
                </form> --}}
            </div>
            @endforeach
        </div>
    </div>
</x-layout>