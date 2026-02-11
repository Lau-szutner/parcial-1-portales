<x-layout>
    <x-slot:title>Crear Cuenta</x-slot:title>

    <main class="container mx-auto min-h-screen flex flex-col items-center justify-center px-6 py-16">
        <div class="text-center mb-10 animate-fade-in">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-slate-900 tracking-tight">Únete a Clauty</h2>
            <p class="text-slate-500 mt-3 font-light">Comienza tu viaje de aprendizaje hoy mismo</p>
        </div>

        @if ($errors->any())
        <div class="w-full max-w-lg mb-8 animate-fade-in">
            <div class="bg-red-50 border border-red-100 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center gap-3 mb-3 text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-bold text-sm uppercase tracking-widest">Revisa los siguientes campos:</span>
                </div>
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                    <li class="text-red-500 text-sm flex items-center gap-2">
                        <span class="h-1 w-1 bg-red-400 rounded-full"></span>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="w-full max-w-lg bg-white border border-slate-200 rounded-[2.5rem] shadow-2xl p-10 md:p-12 animate-fade-in delay-1">
            <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-6">
                @csrf

                <div class="group flex flex-col gap-2">
                    <label for="name" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Nombre Completo</label>
                    <input type="text" name="name" id="name"
                        class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-700 placeholder:text-slate-300"
                        placeholder="Tu nombre aquí" value="{{ old('name') }}">
                </div>

                <div class="group flex flex-col gap-2">
                    <label for="email" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Correo Electrónico</label>
                    <input type="email" name="email" id="email"
                        class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-700 placeholder:text-slate-300"
                        placeholder="correo@ejemplo.com" value="{{ old('email') }}">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group flex flex-col gap-2">
                        <label for="password" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Contraseña</label>
                        <input type="password" name="password" id="password"
                            class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-700 placeholder:text-slate-400"
                            placeholder="••••••••">
                    </div>

                    <div class="group flex flex-col gap-2">
                        <label for="password_confirmation" class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400 group-focus-within:text-indigo-600 transition-colors">Confirmar</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full bg-slate-50 border border-slate-200 p-4 rounded-2xl outline-none transition-all focus:bg-white focus:ring-4 focus:ring-indigo-50 focus:border-indigo-500 text-slate-700 placeholder:text-slate-400"
                            placeholder="••••••••">
                    </div>
                </div>

                <div class="flex flex-col gap-4 mt-6">
                    <button type="submit"
                        class="w-full bg-slate-900 text-white py-5 rounded-2xl font-bold text-xs uppercase tracking-[0.2em] shadow-xl hover:bg-indigo-600 hover:shadow-indigo-200 hover:-translate-y-1 active:scale-95 transition-all duration-300">
                        Crear mi cuenta
                    </button>

                    <p class="text-center text-slate-400 text-[10px] font-bold uppercase tracking-widest py-2">¿Ya tienes cuenta?</p>

                    <a href="{{ route('login') }}"
                        class="w-full border-2 border-slate-100 text-slate-600 py-5 rounded-2xl font-bold text-xs uppercase tracking-[0.2em] flex items-center justify-center hover:bg-slate-50 hover:border-slate-200 transition-all">
                        Volver al Login
                    </a>
                </div>
            </form>
        </div>
    </main>
</x-layout>