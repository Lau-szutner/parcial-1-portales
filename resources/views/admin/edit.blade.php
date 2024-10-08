<?php

/** @var  \Illuminate\Models\Article $article */
/** @var  \Illuminate\Support\ViewErrorBag $errors */
?>

<x-layout>
    <x-slot:title>Editar {{ $article->title }}</x-slot:title>

    <h1 class="text-4xl text-center my-10 text-bold">Editar {{ $article->title }}</h1>

    @if ($errors->any())
        <div class="bg-red-500 p-5 text-center">Tenes errores en tus datos ingresados</div>
    @endif
    {{-- admin/dashboard/{id}/subir --}}
    <form action="{{ url('admin/dashboard/' . $article->id . '/publicar') }}" method="post" enctype="multipart/form-data"
        class="grid container mx-auto my-10 w-6/12">
        @csrf
        <div class="mb-4 flex flex-col text-2xl">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="border-2"
                @error('title') aria-errormessage="error-title" @enderror value="{{ old('title', $article->title) }}">
            @error('title')
                <div class="text-red-500 text-xl  rounded-md " id="error-title">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4 flex flex-col text-2xl">
            <label for="img">imagen</label>
            <input type="file" name="img" id="imagen" class="border-2">
        </div>
        <div class="mb-4 flex flex-col text-2xl">
            <label for="category">Categoria</label>
            <input type="text" name="category" id="category" class="border-2"
                @error('category')
                aria-errormessage="error-category"
            @enderror
                value="{{ old('category', $article->category) }}">

            @error('category')
                <div class="text-red-500 text-xl rounded-md my-2" id="error-title">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="time-to-read">Tiempo de lectura</label>
            <input type="text" name="time-to-read" id="time-to-read" class="border-2"
                @error('time-to-read')
                aria-errormessage="error-time-to-read"
            @enderror
                value="{{ old('time-to-read') }}">

            @error('time-to-read')
                <div class="text-red-500 text-xl rounded-md my-2" id="error-time-to-read">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="author">Autor</label>
            <input type="text" name="author" id="author" class="border-2"
                @error('author')
                aria-errormessage="error-author"
            @enderror
                value="{{ old('author', $article->category) }}">

            @error('author')
                <div class="text-red-500 text-xl rounded-md my-2" id="error-author">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="body">Contenido</label>
            <textarea id="body" name="body" rows="10"
                @error('author')
                aria-errormessage="error-author"
            @enderror>{{ old('body', $article->body) }}</textarea>

            @error('author')
                <div class="text-red-500 text-xl rounded-md my-2" id="error-author">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4 flex flex-col text-2xl">
            <label for="excerpt">Descripcion</label>
            <textarea type="text" name="excerpt" id="excerpt" class="border-2" rows="10"
                @error('excerpt')
                aria-errormessage="error-excerpt"
            @enderror>{{ old('excerpt', $article->excerpt) }}</textarea>

            @error('excerpt')
                <div class="text-red-500 text-xl rounded-md my-2" id="error-excerpt">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="text-white bg-[var(--primary-color)] p-4 rounded-xl">Guardar cambios</button>
    </form>
</x-layout>
