<x-layout>
    <x-slot:title>Artículos</x-slot:title>

    <main class="container mx-auto flex flex-col items-center">
        <h1 class="text-5xl my-10">Artículos</h1>

        <div class="grid grid-cols-2 gap-4 w-full">
            @foreach ($articles as $article)
                <div class="grid bg-red-400 p-4 rounded-lg gap-5">
                    <h2 class="text-3xl font-bold">{{ $article->title }}</h2>
                    <p>Autor: {{ $article->author }}</p>
                    <img class="h-72 rounded-lg place-self-center" src="{{ $article->img }}"
                        alt="Imagen del artículo {{ $article->title }}" class="w-full h-auto rounded-lg">
                    <p class="text-lg">
                        {!! (new Parsedown())->text($article->excerpt) !!}
                    </p>
                    <p class="bg-red-300 w-fit p-2 rounded-lg">Categoría: {{ $article->category }}</p>
                    <button
                        class="bg-red-500 py-3 px-5 rounded-lg hover:bg-white ease-in-out duration-300">Leer</button>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>
