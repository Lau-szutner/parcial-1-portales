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
                    <th class="border-2">ID</th>
                    <th class="border-2">Title</th>
                    <th class="border-2">Image</th>
                    <th class="border-2">Category</th>
                    <th class="border-2">Time to Read</th>
                    <th class="border-2">Author</th>
                    <th class="border-2">Excerpt</th>
                    <th class="border-2">Content</th>
                    <th class="border-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="border-2 p-10">
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->title }}</td>
                        <td>
                            @if ($article->img)
                                <img src="{{ $article->img }}" alt="Image for {{ $article->title }}" width="100">
                            @else
                                No image
                            @endif
                        </td>
                        <td>{{ $article->category }}</td>
                        <td>{{ $article->time_to_read }} min</td>
                        <td>{{ $article->author }}</td>
                        <td class="w-fit">{{ $article->excerpt }}</td>
                        <td><a href="{{ $article->content_path }}">Read more</a></td>
                        <td>crear</td>
                    </tr>
                @endforeach
            </tbody>

            <button class="text-center p-4 bg-blue-500"><x-nav-link route="create">Publicar un nuevo
                    articulo</x-nav-link></button>
        </table>
    </section>





    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</x-layout>
