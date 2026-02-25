<x-layout>
    <x-slot:title>Crear Nuevo Curso</x-slot:title>

    @auth
    <main class="container mx-auto px-6 py-16">
        {{-- Encabezado --}}
        <div class="max-w-4xl mx-auto mb-12 animate-fade-in">
            <div class="flex items-center gap-4 mb-2">
                <span class="bg-indigo-600 h-1 w-12 rounded-full"></span>
                <span class="text-indigo-600 font-bold tracking-[0.2em] uppercase text-[10px]">Gestión Académica</span>
            </div>
            <h2 class="text-5xl font-serif text-slate-900 leading-tight">Crear un nuevo curso</h2>
            <p class="text-slate-500 mt-2 font-light">Diseña una nueva experiencia de aprendizaje para tus alumnos.</p>
        </div>

        {{-- Alerta de Errores --}}
        @if ($errors->any())
        <div class="max-w-4xl mx-auto mb-10 animate-fade-in">
            <div class="bg-red-50 border border-red-100 p-6 rounded-[2rem] flex items-center gap-4 shadow-sm">
                <div class="bg-red-500 p-2 rounded-full shadow-lg shadow-red-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-red-800 font-bold text-sm uppercase tracking-wider">Revisa los datos del curso antes de continuar</span>
            </div>
        </div>
        @endif

        {{-- Formulario de Creación --}}
        <form action="{{ route('curso.store') }}" method="POST" enctype="multipart/form-data"
            class="max-w-4xl mx-auto bg-white border border-slate-100 rounded-[2.5rem] shadow-2xl p-8 md:p-12 animate-fade-in delay-1">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                {{-- Columna Izquierda --}}
                <div class="space-y-8">
                    <div class="group flex flex-col gap-2">
                        <label for="nombre" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Nombre del Curso</label>
                        <input type="text" name="nombre" id="nombre"
                            class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-800 font-medium @error('nombre') border-red-300 @enderror"
                            placeholder="Ej: Master en Laravel Avanzado" value="{{ old('nombre') }}">
                        @error('nombre') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="group flex flex-col gap-2">
                            <label for="duracion" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Duración (min)</label>
                            <input type="number" name="duracion" id="duracion"
                                class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all"
                                placeholder="120" value="{{ old('duracion') }}">
                            @error('duracion') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>
                        
                        {{-- Select Manual Corregido --}}
                        <div class="group flex flex-col gap-2">
                            <label for="nivel" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Nivel</label>
                            <select name="nivel" id="nivel" 
                                class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all cursor-pointer @error('nivel') border-red-300 @enderror">
                                <option value="" disabled {{ old('nivel') ? '' : 'selected' }}>Seleccionar</option>
                                <option value="1" {{ old('nivel') == '1' ? 'selected' : '' }}>1 - Básico</option>
                                <option value="2" {{ old('nivel') == '2' ? 'selected' : '' }}>2 - Medio</option>
                                <option value="3" {{ old('nivel') == '3' ? 'selected' : '' }}>3 - Pro</option>
                            </select>
                            @error('nivel') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                {{-- Columna Derecha --}}
                <div class="space-y-8">
                    <div class="group flex flex-col gap-3">
                        <label class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Imagen de Portada</label>
                        <div class="relative overflow-hidden rounded-[2rem] bg-slate-50 border-2 border-dashed border-slate-200 p-8 transition-all hover:border-indigo-400 text-center">
                            <input type="file" name="imagen" id="imagen" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100 cursor-pointer">
                        </div>
                        @error('imagen') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
                    </div>

                    <div class="bg-slate-50 p-6 rounded-3xl border border-slate-100">
                        <span class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Instructor</span>
                        <div class="flex items-center gap-4 mt-4">
                            <div class="h-10 w-10 rounded-full bg-slate-900 flex items-center justify-center text-white font-bold text-xs">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-10 border-slate-50">

            <div class="group flex flex-col gap-2">
                <label for="descripcion" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="6"
                    class="w-full bg-slate-50 border border-slate-100 p-6 rounded-[2rem] outline-none focus:bg-white focus:ring-4 focus:ring-indigo-50 transition-all text-slate-800 leading-relaxed"
                    placeholder="Contenido del curso...">{{ old('descripcion') }}</textarea>
                @error('descripcion') <p class="text-red-500 text-[10px] font-bold mt-1 uppercase">{{ $message }}</p> @enderror
            </div>

            <div class="mt-12 flex justify-center">
                <button type="submit" class="w-full max-w-sm bg-slate-900 text-white py-6 rounded-full font-bold text-xs uppercase tracking-[0.3em] shadow-2xl hover:bg-indigo-600 hover:-translate-y-1 active:scale-95 transition-all duration-300">
                    Crear Curso Ahora
                </button>
            </div>
        </form>
    </main>
    @endauth
</x-layout>