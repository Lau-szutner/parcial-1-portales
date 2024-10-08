<?php
// dd($articles);
?>

<x-layout>
    <x-slot:title>Admin
    </x-slot:title>

    <h1 class="text-4xl text-center my-10">Articulos</h1>
    <section class="flex flex-col">
        <table class="container mx-auto border-2">

            <thead class="border-2">
                <tr>
                    <th class="border-2 border-zinc-400">ID</th>
                    <th class="border-2 border-zinc-400">Title</th>
                    <th class="border-2 border-zinc-400">Image</th>
                    <th class="border-2 border-zinc-400">Category</th>
                    <th class="border-2 border-zinc-400">Time to Read</th>
                    <th class="border-2 border-zinc-400">Author</th>
                    <th class="border-2 border-zinc-400">Excerpt</th>
                    <th class="border-2 border-zinc-400">Content</th>
                    <th class="border-2 border-zinc-400">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="border-2 p-10">
                        <td class="border-2 p-2 border-zinc-400">{{ $article->id }}</td>
                        <td class="border-2 p-2 border-zinc-400">{{ $article->title }}</td>
                        <td class="border-2 p-2 border-zinc-400">
                            @if ($article->img)
                                <img src="{{ $article->img }}" alt="Image for {{ $article->title }}" width="100">
                            @else
                                No image
                            @endif
                        </td>
                        <td class="border-2 p-2 border-zinc-400">{{ $article->category }}</td>
                        <td class="border-2 p-2 border-zinc-400">{{ $article->time_to_read }} min</td>
                        <td class="border-2 p-2 border-zinc-400">{{ $article->author }}</td>
                        <td class="w-fit border-2 p-2 border-zinc-400">{{ $article->excerpt }}</td>
                        <td class="border-2 p-2 border-zinc-400"><a href="{{ $article->content_path }}">Read more</a>
                        </td>
                        <td class="border-2 p-2 border-zinc-400 h-fit ">
                            <div class="flex gap-2">
                                <a href="{{ route('article.delete', ['id' => $article->id]) }}"
                                    class="p-4 bg-red-500 rounded-md">Eliminar</a>
                                <a href="{{ route('article.edit', ['id' => $article->id]) }}"
                                    class="p-4 bg-zinc-500 rounded-md">Editar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>



        </table>
        <button class="text-center p-4 bg-blue-500 my-10 w-fit self-center rounded-xl">
            <x-nav-link route="create">Publicar un nuevo
                articulo
            </x-nav-link>
        </button>


    </section>





    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</x-layout>
