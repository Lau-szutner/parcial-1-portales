<?php

/** @var  \Illuminate\Support\ViewErrorBag $errors */
?>
    
    <x-layout>
        <x-slot:title>Publicar un nuevo articulo</x-slot:title>
        @auth
    
    <h1 class="text-4xl text-center my-10">Publicar un nuevo articulo</h1>
    
    @if ($errors->any())
    <div class="bg-red-500 p-5 text-center">Tenes errores en tus datos ingresados</div>
    @endif
    
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
    class="grid container mx-auto my-10 w-6/12">
    @csrf
    <div class="mb-4 flex flex-col text-2xl">
        <label for="title">Titulo</label>
        <input type="text" name="title" id="title" class="border-2"
        @error('title') aria-errormessage="error-title" @enderror value="{{ old('title') }}">
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
        value="{{ old('category') }}">
        
        @error('category')
        <div class="text-red-500 text-xl rounded-md my-2" id="error-title">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-4 flex flex-col text-2xl">
        <label for="time">Tiempo de lectura</label>
        <input type="text" name="time" id="time" class="border-2"
        @error('time')
        aria-errormessage="error-time"
        @enderror
        value="{{ old('time') }}">
        
        @error('time')
        <div class="text-red-500 text-xl rounded-md my-2" id="error-time">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-4 flex flex-col text-2xl">
        <label for="author">Autor</label>
        <input type="text" name="author" id="author" class="border-2"
        @error('author')
        aria-errormessage="error-author"
        @enderror
        value="{{ old('author') }}">
        
        @error('author')
        <div class="text-red-500 text-xl rounded-md my-2" id="error-author">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-4 flex flex-col text-2xl">
        <label for="body">Contenido</label>
        <textarea id="body" name="body" rows="10"
        @error('author')
        aria-errormessage="error-author"
        @enderror>{{ old('body') }}</textarea>
        
        @error('author')
        <div class="text-red-500 text-xl rounded-md my-2" id="error-author">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4 flex flex-col text-2xl">
        <label for="excerpt">descripcion</label>
        <input type="text" name="excerpt" id="excerpt" class="border-2"
        @error('excerpt')
        aria-errormessage="error-excerpt"
        @enderror
        value="{{ old('excerpt') }}">
        @error('excerpt')
        <div class="text-red-500 text-xl rounded-md my-2" id="error-excerpt">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="text-white bg-[var(--primary-color)] p-4 rounded-xl">Publicar</button>
</form>
@endauth
</x-layout>
