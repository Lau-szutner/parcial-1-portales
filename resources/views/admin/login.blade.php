<x-layout>
    <x-slot:title>Iniciar Sesión</x-slot:title>

    <main class="container mx-auto min-h-[80vh] flex flex-col items-center justify-center px-6 py-12">
        <div class="text-center mb-10 animate-fade-in">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-slate-900 tracking-tight">Bienvenido de nuevo</h2>
            <p class="text-slate-500 mt-3 font-light">Ingresa tus credenciales para acceder a tu panel</p>
        </div>

        @if ($errors->any())
        <div class="w-full max-w-md mb-6 animate-bounce">
            <div class="bg-red-50 border border-red-100 text-red-600 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <span class="text-sm font-semibold">Credenciales incorrectas, por favor intenta de nuevo.</span>
            </div>
        </div>
        @endif

        <div class="w-full max-w-md bg-white border border-slate-200 rounded-[2.5rem] shadow-2xl p-10 md:p-12 animate-fade-in delay-1">
            <form action="{{ route('admin.auth') }}" method="GET" class="flex flex-col gap-8">
                @csrf

                <div class="group flex flex-col gap-2">
                    <label for="email" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                        Correo Electrónico
                    </label>
                    <div class="relative">
                        <input type="email" name="email" id="email"
                            class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-700 placeholder:text-slate-300"
                            placeholder="ejemplo@clauty.com" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="group flex flex-col gap-2">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">
                            Contraseña
                        </label>
                        <a href="#" class="text-[10px] font-bold text-indigo-500 hover:text-indigo-700 uppercase tracking-tighter">¿Olvidaste tu clave?</a>
                    </div>
                    <input type="password" name="password" id="password"
                        class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-700 placeholder:text-slate-400"
                        placeholder="••••••••">
                </div>

                <div class="flex flex-col gap-4 mt-4">
                    <button type="submit"
                        class="w-full bg-slate-900 text-white py-5 rounded-2xl font-bold text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-indigo-600 hover:shadow-indigo-200 hover:-translate-y-1 active:scale-95 transition-all duration-300">
                        Iniciar Sesión
                    </button>

                    <div class="relative flex items-center py-4">
                        <div class="flex-grow border-t border-slate-100"></div>
                        <span class="flex-shrink mx-4 text-slate-300 text-[10px] font-bold uppercase tracking-widest">O</span>
                        <div class="flex-grow border-t border-slate-100"></div>
                    </div>

                    <a href="{{ route('admin.register') }}"
                        class="w-full border-2 border-slate-100 text-slate-600 py-5 rounded-2xl font-bold text-xs uppercase tracking-[0.2em] flex items-center justify-center hover:bg-slate-50 hover:border-slate-200 transition-all">
                        Crear una cuenta nueva
                    </a>
                </div>
            </form>
        </div>

        <p class="mt-10 text-slate-400 text-xs font-light tracking-wide">
            Al iniciar sesión, aceptas nuestros <a href="#" class="underline hover:text-slate-600">Términos de Servicio</a>.
        </p>
    </main>
</x-layout>