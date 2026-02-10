<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 * @var string $usuario
 */
?>

<x-layout>
    <x-slot:title>Cursos adquiridos</x-slot:title>

    @auth
    <div class="bg-white shadow overflow-hidden sm:rounded-lg border">
        <div class="px-4 py-5 sm:px-6 bg-[var(--primary-color)]">
            <h3 class="text-lg leading-6 font-medium text-[var(--accent-color)]">Información del Usuario</h3>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Nombre completo</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ auth()->user()->name }}</dd>
                </div>
                <div class="bg-white px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ auth()->user()->email }}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Rol de usuario</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs">
                            {{ auth()->user()->rol ?? 'Estudiante' }}
                        </span>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    @endauth

    <main class="container mx-auto flex flex-col items-center">
        <h2 class="text-5xl my-10">Cursos adquiridos por {{ $usuario }}</h2>

        <div class="grid grid-cols-2 gap-4 w-full text-[var(--accent-color)]">
            @foreach ($cursos as $curso)
            <div class="grid bg-[var(--primary-color)] p-4 rounded-lg gap-5">
                <h3 class="text-3xl font-bold">{{ $curso->nombre }}</h3> <!-- Nombre del curso -->
                <p>Duración: {{ $curso->duracion }} horas</p> <!-- Duración del curso -->
                <img src="{{ asset($curso->imagen) }}" alt="{{ $curso->nombre }}">
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