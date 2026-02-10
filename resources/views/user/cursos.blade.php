<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 * @var string $usuario
 */
?>

<x-layout>
    <x-slot:title>Cursos adquiridos</x-slot:title>

    <main class="container mx-auto flex flex-col items-center">
        <h2 class="text-5xl my-10">Cursos adquiridos por {{ $usuario }}</h2> <!-- Mostrar nombre del usuario -->

        <div class="grid grid-cols-2 gap-4 w-full text-[var(--accent-color)]">
            @foreach ($cursos as $curso)
            <!-- Mostrar cada curso adquirido -->
            <div class="grid bg-[var(--primary-color)] p-4 rounded-lg gap-5">
                <h3 class="text-3xl font-bold">{{ $curso->nombre }}</h3> <!-- Nombre del curso -->
                <p>Duración: {{ $curso->duracion }} horas</p> <!-- Duración del curso -->
                <img class="h-72 rounded-lg place-self-center" src="{{ $curso->imagen }}" alt="{{ $curso->nombre }}"
                    class="w-full h-auto rounded-lg">
                <p class="text-lg">
                    {{ $curso->descripcion }} <!-- Descripción del curso -->
                </p>
                <p class="bg-[var(--secondary-color)] w-fit p-2 rounded-lg">Nivel: {{ $curso->nivel }}</p>
                <!-- Nivel del curso -->
                <button
                    class="bg-[var(--secondary-color)] py-3 px-5 rounded-lg hover:bg-[var(--accent-color)] ease-in-out duration-300 hover:text-[var(--primary-color)]">
                    <a href="#">Ver</a> <!-- Enlace para ver más detalles del curso -->
                </button>
            </div>
            @endforeach
        </div>
    </main>
</x-layout>