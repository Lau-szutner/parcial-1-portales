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
        <section class="mx-auto bg-[var(--primary-color)] flex flex-col items-center py-10">
            <h2 class="text-4xl text-[var(--accent-color)]">Los mejores cursos por profesionales</h2>
            <div class="container mx-auto flex gap-5 flex-row justify-center py-10">
                <img src="{{ asset('/images/cursos/javascript.png') }}" alt="Curso de javascript"
                    class="rounded-lg w-4/12">
                <img src="{{ asset('/images/cursos/laravel.png') }}" alt="Curso de laravel" class="rounded-lg w-4/12">
                <img src="{{ asset('/images/cursos/php.png') }}" alt="Curso de php" class="rounded-lg w-4/12">
            </div>

            <button class="bg-[var(--secondary-color)] py-2 px-6 rounded-xl text-white">
                <x-nav-link route="cursos.index">Cursos</x-nav-link>
            </button>
        </section>
        <section class="container mx-auto flex flex-col items-center">
            <h2 class="text-5xl my-10">Los mejores articulos de la web</h2>

            <div class="grid grid-cols-3 gap-4">
                @foreach ($articles as $article)
                    <div class="grid gap-5 bg-[var(--primary-color)] p-4 rounded-lg gap-5 text-[var(--accent-color)]">
                        <h2 class="text-2xl"><strong>{{ $article->title }}</strong></h2>

                        <div class="flex flex-col justify-between">
                            <p><strong>Autor: </strong> {{ $article->author }}</p>

                            <img src="{{ $article->img }}" alt="Imagen del artículo {{ $article->title }}"
                                class="w-full h-auto rounded-lg">
                            <p>{{ $article->excerpt }}</p>

                            <div class="mt-5 w-100">
                                <p><strong class="text-bold">Categoria: </strong>{{ $article->category }}</p>
                                <button class="bg-[var(--secondary-color)] h-10 rounded-lg w-full"> <a
                                        href="{{ route('articles.view', ['id' => $article->id]) }}">Leer</a></button>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

        </section>
    </main>
</x-layout>
