<?php
/** @var \App\Models\articles $article */
?>

<x-layout>
    <x-slot:title>Eliminar articulo {{ $article->id }}
    </x-slot:title>

    <section class="container mx-auto grid gap-5 my-5">
        <h1 class="text-4xl">
            Se requiere confirmacion para eliminar
        </h1>
        <div class="text-2xl">
            <p>Estas seguro de eliminar el articulo: <b>{{ $article->title }}</b></p>
        </div>

        <form action="{{ route('article.destroy', ['id' => $article->id]) }}" method="post">
            @csrf
            <button type="submit" class="bg-red-500 p-2 rounded-xl border-md">Si, deseo eliminar</button>
        </form>

        <dl class="grid gap-5">
            <dt class="text-2xl">Titulo</dt>
            <dd class="border-b-2 border-zinc-400">{{ $article->title }}</dd>
            <dt class="text-2xl">Autor</dt>
            <dd class="border-b-2 border-zinc-400">{{ $article->author }}</dd>
            <dt class="text-2xl">imagen</dt>
            <dd class="border-b-2 border-zinc-400">{{ $article->img }}</dd>
            <dt class="text-2xl">Autor</dt>
            <dd class="border-b-2 border-zinc-400">{{ $article->category }}</dd>
            <dt class="text-2xl">Contenido</dt>
            <dd class="border-b-2 border-zinc-400">{{ $article->body }}</dd>
            <dt class="text-2xl">excerpt</dt>
            <dd class="border-b-2 border-zinc-400">{{ $article->excerpt }}</dd>
        </dl>
    </section>

    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</x-layout>
