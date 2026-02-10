<x-layout>
    <x-slot:title>Editar {{ $article->title }}</x-slot:title>
    @auth

    <h2 class="text-4xl text-center my-10 font-bold">Editar: {{ $article->title }}</h2>

    @if ($errors->any())
    <div class="bg-red-500 text-white p-5 text-center rounded-md mb-4 mx-auto w-6/12">
        <p class="font-bold mb-2">Tenés errores en los datos ingresados:</p>
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('article.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data"
        class="grid container mx-auto my-10 w-6/12">
        @csrf
        @method('PUT') {{-- Importante: Laravel usa PUT o PATCH para actualizaciones --}}

        <div class="mb-4 flex flex-col text-2xl">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" class="border-2"
                value="{{ old('title', $article->title) }}">
            @error('title')
            <div class="text-red-500 text-xl font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="img">Imagen Actual</label>
            @if($article->img)
            <img src="{{ asset($article->img) }}" alt="Imagen actual" class="w-32 mb-2">
            @endif
            <input type="file" name="img" id="img" class="border-2">
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="category">Categoría</label>
            <input type="text" name="category" id="category" class="border-2"
                value="{{ old('category', $article->category) }}">
            @error('category')
            <div class="text-red-500 text-xl font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="time">Tiempo de lectura</label>
            <input type="text" name="time" id="time" class="border-2"
                value="{{ old('time', $article->time) }}">
            @error('time')
            <div class="text-red-500 text-xl font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label class="text-gray-700">Autor</label>
            <div class="border-2 p-2 bg-gray-100 text-gray-600 cursor-not-allowed">
                {{ Auth::user()->name }}
            </div>
            <input type="hidden" name="author" value="{{ Auth::user()->name }}">
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="body">Contenido</label>
            <textarea id="body" name="body" rows="10" class="border-2">{{ old('body', $article->body) }}</textarea>
            @error('body')
            <div class="text-red-500 text-xl font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="excerpt">Descripción corta</label>
            <input type="text" name="excerpt" id="excerpt" class="border-2"
                value="{{ old('excerpt', $article->excerpt) }}">
            @error('excerpt')
            <div class="text-red-500 text-xl font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="nivel_fk">Nivel</label>
            <select name="nivel_fk" id="nivel_fk" class="border-2">
                @foreach ($nivels as $nivel)
                <option value="{{ $nivel->nivel_id }}"
                    @if ($nivel->nivel_id == old('nivel_fk', $article->nivel_fk)) selected @endif>
                    {{ $nivel->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4 flex flex-col text-2xl">
            <label for="topicos_fk">Tópicos (Mantén presionado Ctrl para seleccionar varios)</label>
            <select name="topicos_fk[]" id="topicos_fk" multiple class="border-2 h-40">
                @foreach ($topics as $topic)
                <option value="{{ $topic->topic_id }}"
                    @if (in_array($topic->topic_id, old('topicos_fk', $article->topics->pluck('topic_id')->toArray()))) selected @endif>
                    {{ $topic->name }}
                </option>
                @endforeach
            </select>
            @error('topicos_fk')
            <div class="text-red-500 text-xl font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="text-white bg-blue-600 p-4 rounded-xl font-bold hover:bg-blue-700">
            Guardar cambios
        </button>
    </form>
    @endauth
</x-layout>