<x-layout>
    <x-slot:title>Editar Artículo</x-slot:title>

    @auth
    <main class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto mb-12 flex items-center justify-between">
            <div class="animate-fade-in">
                <span class="text-indigo-600 font-bold tracking-[0.2em] uppercase text-[10px]">Editor de Artículos</span>
                <h2 class="text-4xl font-serif text-slate-900 mt-2">Editar: <span class="italic text-slate-500">{{ $article->title }}</span></h2>
            </div>
            <a href="{{ route('dashboard') }}" class="text-xs font-bold uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-colors flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al panel
            </a>
        </div>

        {{-- Alerta de Errores Estilizada --}}
        @if ($errors->any())
        <div class="max-w-4xl mx-auto mb-10 animate-bounce">
            <div class="bg-red-50 border border-red-100 p-6 rounded-[2rem] flex items-start gap-4 shadow-sm shadow-red-100">
                <div class="bg-red-500 p-2 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-red-800 text-sm uppercase tracking-wider mb-2">Se requiere atención en los campos:</p>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 list-disc list-inside text-red-600/80 text-xs font-medium">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        {{-- Formulario Principal --}}
        <form action="{{ route('article.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data"
            class="max-w-4xl mx-auto bg-white border border-slate-100 rounded-[2.5rem] shadow-2xl p-8 md:p-12 animate-fade-in delay-1">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                {{-- Columna Izquierda: Identidad --}}
                <div class="space-y-8">
                    <div class="group flex flex-col gap-2">
                        <label for="title" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Título del Artículo</label>
                        <input type="text" name="title" id="title"
                            class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-800 font-medium"
                            value="{{ old('title', $article->title) }}">
                    </div>

                    <div class="group flex flex-col gap-2">
                        <label for="category" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Categoría</label>
                        <input type="text" name="category" id="category"
                            class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-800"
                            value="{{ old('category', $article->category) }}">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="group flex flex-col gap-2">
                            <label for="time" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Lectura (min)</label>
                            <input type="text" name="time" id="time"
                                class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all"
                                value="{{ old('time', $article->time) }}">
                        </div>
                        <div class="group flex flex-col gap-2">
                            <label for="nivel_fk" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Nivel</label>
                            <select name="nivel_fk" id="nivel_fk" class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all appearance-none cursor-pointer text-slate-700">
                                @foreach ($nivels as $nivel)
                                <option value="{{ $nivel->nivel_id }}" @if ($nivel->nivel_id == old('nivel_fk', $article->nivel_fk)) selected @endif>
                                    {{ $nivel->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Columna Derecha: Multimedia --}}
                <div class="space-y-8 text-center md:text-left">
                    <div class="group flex flex-col gap-3">
                        <label class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Imagen de Portada</label>
                        <div class="relative group/img overflow-hidden rounded-[2rem] bg-slate-50 border-2 border-dashed border-slate-200 p-2 transition-all hover:border-indigo-400">
                            @if($article->img)
                            <img src="{{ asset($article->img) }}" alt="Imagen actual" class="w-full h-40 object-cover rounded-[1.5rem] opacity-80 group-hover/img:opacity-100 transition-opacity">
                            @endif
                            <input type="file" name="img" id="img" class="mt-4 w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 cursor-pointer">
                        </div>
                    </div>

                    <div class="flex flex-col gap-2 bg-slate-50 p-6 rounded-3xl border border-slate-100">
                        <span class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Autor Registrado</span>
                        <div class="flex items-center gap-3 mt-1">
                            <div class="h-8 w-8 rounded-full bg-indigo-600 flex items-center justify-center text-white text-[10px] font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-sm font-bold text-slate-700">{{ Auth::user()->name }}</span>
                        </div>
                        <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                    </div>
                </div>
            </div>

            <hr class="my-10 border-slate-50">

            {{-- Área de Contenido --}}
            <div class="space-y-8">
                <div class="group flex flex-col gap-2">
                    <label for="excerpt" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Descripción Corta (Excerpt)</label>
                    <input type="text" name="excerpt" id="excerpt"
                        class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all italic text-slate-600"
                        value="{{ old('excerpt', $article->excerpt) }}">
                </div>

                <div class="group flex flex-col gap-2">
                    <label for="body" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Cuerpo del Artículo</label>
                    <textarea id="body" name="body" rows="12"
                        class="w-full bg-slate-50 border border-slate-100 p-6 rounded-[2rem] outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all text-slate-800 leading-relaxed">{{ old('body', $article->body) }}</textarea>
                </div>

                <div class="group flex flex-col gap-2">
                    <label for="topicos_fk" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Tópicos Relacionados</label>
                    <div class="relative">
                        <select name="topicos_fk[]" id="topicos_fk" multiple class="w-full bg-slate-50 border border-slate-100 p-4 rounded-[2rem] outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all h-48 cursor-pointer overflow-y-auto scrollbar-hide">
                            @foreach ($topics as $topic)
                            <option value="{{ $topic->topic_id }}"
                                class="p-2 rounded-lg m-1 text-sm checked:bg-indigo-600 checked:text-white"
                                @if (in_array($topic->topic_id, old('topicos_fk', $article->topics->pluck('topic_id')->toArray()))) selected @endif>
                                {{ $topic->name }}
                            </option>
                            @endforeach
                        </select>
                        <p class="mt-2 text-[9px] text-slate-400 italic text-center">💡 Tip: Mantén presionado Ctrl (o Cmd) para seleccionar múltiples tópicos</p>
                    </div>
                </div>
            </div>

            {{-- Botón de Acción --}}
            <div class="mt-12">
                <button type="submit" class="w-full bg-slate-900 text-white py-6 rounded-full font-bold text-xs uppercase tracking-[0.3em] shadow-2xl hover:bg-indigo-600 hover:shadow-indigo-200 hover:-translate-y-1 active:scale-95 transition-all duration-300">
                    Actualizar Contenido
                </button>
            </div>
        </form>
    </main>
    @endauth
</x-layout>