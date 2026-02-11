<x-layout>
    <x-slot:title>Publicar un nuevo artículo</x-slot:title>

    @auth
    <main class="container mx-auto px-6 py-16">
        <div class="max-w-4xl mx-auto mb-12 animate-fade-in">
            <div class="flex items-center gap-4 mb-2">
                <span class="bg-indigo-600 h-1 w-12 rounded-full"></span>
                <span class="text-indigo-600 font-bold tracking-[0.2em] uppercase text-[10px]">Nuevo Contenido</span>
            </div>
            <h2 class="text-5xl font-serif text-slate-900 leading-tight">Publicar un nuevo artículo</h2>
            <p class="text-slate-500 mt-2 font-light">Comparte tus conocimientos con la comunidad de Clauty.</p>
        </div>

        {{-- Alerta de Errores Optimizada --}}
        @if ($errors->any())
        <div class="max-w-4xl mx-auto mb-10 animate-fade-in">
            <div class="bg-red-50 border border-red-100 p-6 rounded-[2rem] flex items-center gap-4 shadow-sm">
                <div class="bg-red-500 p-2 rounded-full shadow-lg shadow-red-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-red-800 font-bold text-sm uppercase tracking-wider">Por favor, revisa los errores en el formulario</span>
            </div>
        </div>
        @endif

        {{-- Formulario de Creación --}}
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data"
            class="max-w-4xl mx-auto bg-white border border-slate-100 rounded-[2.5rem] shadow-2xl p-8 md:p-12 animate-fade-in delay-1">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                {{-- Columna de Datos Básicos --}}
                <div class="space-y-8">
                    <div class="group flex flex-col gap-2">
                        <label for="title" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Título del Artículo</label>
                        <input type="text" name="title" id="title"
                            class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-800 font-medium @error('title') border-red-300 @enderror"
                            placeholder="Ej: Las maravillas de Laravel" value="{{ old('title') }}">
                        @error('title') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="group flex flex-col gap-2">
                        <label for="category" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Categoría</label>
                        <input type="text" name="category" id="category"
                            class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-800"
                            placeholder="Ej: Desarrollo Web" value="{{ old('category') }}">
                        @error('category') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="group flex flex-col gap-2">
                            <label for="time" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Lectura (min)</label>
                            <input type="text" name="time" id="time"
                                class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all"
                                placeholder="5" value="{{ old('time') }}">
                        </div>
                        <div class="group flex flex-col gap-2">
                            <label for="nivel_fk" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Nivel</label>
                            <select name="nivel_fk" id="nivel_fk" class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all cursor-pointer">
                                @foreach ($nivels as $nivel)
                                <option value="{{ $nivel->nivel_id }}" @if ($nivel->nivel_id == old('nivel_fk')) selected @endif>
                                    {{ $nivel->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Columna de Multimedia y Autor --}}
                <div class="space-y-8">
                    <div class="group flex flex-col gap-3">
                        <label class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Imagen Destacada</label>
                        <div class="relative overflow-hidden rounded-[2rem] bg-slate-50 border-2 border-dashed border-slate-200 p-8 transition-all hover:border-indigo-400 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-slate-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <input type="file" name="img" id="img" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 cursor-pointer">
                        </div>
                        @error('img') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                        <span class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Perfil del Autor</span>
                        <div class="flex items-center gap-4 mt-4">
                            <div class="h-10 w-10 rounded-full bg-slate-900 flex items-center justify-center text-white font-bold text-xs">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name }}</p>
                                <p class="text-[10px] text-slate-400">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                    </div>
                </div>
            </div>

            <hr class="my-10 border-slate-50">

            {{-- Contenido Extenso --}}
            <div class="space-y-8">
                <div class="group flex flex-col gap-2">
                    <label for="excerpt" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600">Descripción Corta (Resumen)</label>
                    <input type="text" name="excerpt" id="excerpt"
                        class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all italic"
                        placeholder="Escribe un breve gancho para los lectores..." value="{{ old('excerpt') }}">
                </div>

                <div class="group flex flex-col gap-2">
                    <label for="body" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600">Cuerpo del Artículo</label>
                    <textarea id="body" name="body" rows="12"
                        class="w-full bg-slate-50 border border-slate-100 p-6 rounded-[2rem] outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all text-slate-800 leading-relaxed"
                        placeholder="Comienza a escribir tu historia aquí...">{{ old('body') }}</textarea>
                    @error('body') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                </div>

                <div class="group flex flex-col gap-2">
                    <label for="topicos_fk" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Seleccionar Tópicos</label>
                    <select name="topicos_fk[]" id="topicos_fk" multiple
                        class="w-full bg-slate-50 border border-slate-100 p-4 rounded-[2rem] outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all h-48 cursor-pointer scrollbar-hide">
                        @foreach ($topics as $topic)
                        <option value="{{ $topic->topic_id }}" class="p-2 rounded-lg m-1 text-sm checked:bg-indigo-600 checked:text-white" @if (in_array($topic->topic_id, old('topicos_fk', []))) selected @endif>
                            {{ $topic->name }}
                        </option>
                        @endforeach
                    </select>
                    <p class="text-center text-[9px] text-slate-400 italic">💡 Mantén presionado Ctrl o Cmd para elegir varios temas.</p>
                </div>
            </div>

            {{-- Botón de Envío --}}
            <div class="mt-12 flex justify-center">
                <button type="submit" class="w-full max-w-sm bg-slate-900 text-white py-6 rounded-full font-bold text-xs uppercase tracking-[0.3em] shadow-2xl hover:bg-indigo-600 hover:-translate-y-1 active:scale-95 transition-all duration-300">
                    Publicar Artículo
                </button>
            </div>
        </form>
    </main>
    @endauth
</x-layout>