<?php

/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 */
?>
<x-layout>
    <x-slot:title>Cursos</x-slot:title>

    <div class="container mx-auto flex flex-col items-center">
        <h2 class="text-5xl my-10 ">Cursos</h2>

        <div class="grid gird-cols-1 lg:grid-cols-2 gap-4 w-full text-[var(--accent-color)] px-10 lg:px-0">
            @foreach ($cursos as $curso)
            <div class="grid bg-[var(--primary-color)] p-4 rounded-lg gap-5">
                <h3 class="text-3xl font-bold">{{ $curso->nombre }}</h3>
                <p>Duración: {{ $curso->duracion }} horas</p>
                <img class="w-full aspect-video object-cover rounded-lg" src="{{ $curso->imagen }}" alt="{{ $curso->nombre }}">
                <p class="text-lg">
                    {{ $curso->descripcion }}
                </p>
                <p class="text-lg">
                    Precio: {{ $curso->precio }}
                </p>
                <p class="bg-[var(--secondary-color)] w-fit p-2 rounded-lg">Nivel: {{ $curso->nivel }}</p>
                <a
                    href="#"
                    class="bg-[var(--secondary-color)] py-3 px-5 rounded-lg
                        inline-flex items-center justify-center
                        transition-all duration-300 ease-in-out
                        hover:bg-[var(--accent-color)]
                        hover:text-[var(--primary-color)]
                        ">
                    Ver más
                </a>


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