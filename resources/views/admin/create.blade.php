<x-layout>
    <x-slot:title>Publicar un nuevo articulo</x-slot:title>

    <h1 class="text-4xl text-center my-10">Publicar un nuevo articulo</h1>

    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
        class="grid container mx-auto my-10 w-6/12">
        @csrf
        <div class="mb-4 flex flex-col text-2xl">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="border-2">
        </div>
        <div class="mb-4 flex flex-col text-2xl">
            <label for="img">imagen</label>
            <input type="file" name="img" id="imagen" class="border-2">
        </div>
        <div class="mb-4 flex flex-col text-2xl">
            <label for="category">Categoria</label>
            <input type="text" name="category" id="category" class="border-2">
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="time-to-read">Time to read</label>
            <input type="text" name="time-to-read" id="time-to-read" class="border-2">
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="Autor">Autor</label>
            <input type="text" name="Autor" id="Autor" class="border-2">
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="content_path">Contenido</label>
            <input type="text" name="content_path" id="content_path" class="border-2">
        </div>
        <div class="mb-4 flex flex-col text-2xl">
            <label for="descripcion">descripcion</label>
            <input type="text" name="descripcion" id="descripcion" class="border-2">
        </div>

        <button type="submit" class="text-white bg-[var(--primary-color)] p-4 rounded-xl">Publicar</button>
    </form>
</x-layout>
