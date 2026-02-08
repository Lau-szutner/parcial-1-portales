<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 */
?>
<x-layout>
    <x-slot:title>Cursos</x-slot:title>

    <main class="container mx-auto flex flex-col items-center">
        <h1 class="text-5xl my-10 ">Cursos</h1>

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
                <button
                    class="bg-[var(--secondary-color)] py-3 px-5 rounded-lg hover:bg-[var(--accent-color)] ease-in-out duration-300 hover:text-[var(--primary-color)]">
                    <a href="#">Ver más</a> <!-- Cambié a la ruta de cursos -->
                </button>

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
    </main>
</x-layout>