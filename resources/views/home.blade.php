<x-layout class="font-serif">
    <x-slot:title>Home</x-slot:title>

    <main>
        <section class="container mx-auto flex m-10 gap-5">
            <div>
                <img src="{{ asset('images/home-01.webp') }}" alt="Descripción de la imagen" class="rounded-lg">
            </div>
            <div class="flex flex-col items-center justify-center">
                <h2 class="font-bold text-2xl">Lorem, ipsum.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolore, quis atque nisi ducimus
                    consequuntur at, neque, iusto eveniet recusandae accusamus. Error sequi vel cul
                    laudantium iur
                </p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos doloremque quae iure magnam
                    cupiditate rerum accusamus fugit autem itaque dolorem!
                </p>
            </div>
        </section>
        <section class="mx-auto bg-gray-200 flex flex-col items-center py-10">
            <h2 class="text-4xl">Los mejores cursos por profesionales</h2>
            <div class="container mx-auto flex gap-5 flex-row justify-center py-10">
                <img src="https://picsum.photos/400/200" alt="" class="rounded-lg">
                <img src="https://picsum.photos/400/200" alt="" class="rounded-lg">
                <img src="https://picsum.photos/400/200" alt="" class="rounded-lg">
            </div>
            <button class="bg-red-500 py-2 px-6 rounded-xl text-white">
                Cursos
            </button>
        </section>
        <section class="container mx-auto flex flex-col items-center">
            <h2 class="text-5xl my-10">Los mejores articulos de la web</h2>

            <div class="grid grid-cols-3 gap-4">
                @foreach ($articles as $article)
                    <div class="flex flex-col bg-red-400 p-4 rounded-lg gap-5">
                        <h2 class="text-2xl">{{ $article->title }}</h2>
                        <p>Autor: {{ $article->author }}</p>
                        <img src="{{ $article->img }}" alt="Imagen del artículo {{ $article->title }}"
                            class="w-full h-auto rounded-lg">
                        <p>Categoria: {{ $article->category }}</p>
                        {{-- <p>{{$article->time-to-read}}</p> --}}

                        <p>Noticia {{ $article->id }}</p>
                        <button class="bg-red-500 py-3 px-5 rounded-lg">Leer</button>
                    </div>
                @endforeach
            </div>

        </section>
    </main>
</x-layout>
