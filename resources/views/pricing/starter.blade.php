<x-layout>
    <x-slot:title>Starter</x-slot:title>

    <main class="min-h-screen bg-gradient-to-b from-emerald-50 to-white py-24 px-6">

        {{-- HERO --}}
        <section class="max-w-5xl mx-auto text-center mb-20">

            <span class="inline-block bg-emerald-100 text-emerald-600 px-5 py-2 rounded-full text-xs font-black uppercase tracking-[0.2em] border border-emerald-200">
                Plan Gratuito
            </span>

            <h1 class="text-5xl md:text-6xl font-serif text-slate-900 mt-8 mb-6 leading-tight">
                Starter
            </h1>

            <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed">
                Perfecto si estás dando tus primeros pasos en programación
                y querés una base sólida sin abrumarte.
            </p>

            <div class="mt-10">
                <span class="text-6xl font-serif text-slate-900">Gratis</span>
                <span class="text-slate-400 text-lg">con tu cuenta</span>
            </div>
        </section>


        {{-- BENEFICIOS --}}
        <section class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-center">

            <div>
                <h2 class="text-3xl font-serif text-slate-900 mb-8">
                    ¿Qué incluye este plan?
                </h2>

                <ul class="space-y-6 text-slate-600">

                    <li class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-emerald-500 rounded-full mt-1"></div>
                        Acceso a cursos Nivel 1
                    </li>

                    <li class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-emerald-500 rounded-full mt-1"></div>
                        Ejercicios prácticos guiados
                    </li>

                    <li class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-emerald-500 rounded-full mt-1"></div>
                        Comunidad y soporte básico
                    </li>

                </ul>
            </div>


            {{-- CAJA --}}
            <div class="bg-slate-900 text-white rounded-[2rem] p-12 shadow-2xl shadow-emerald-200">

                <h3 class="text-2xl font-serif mb-6">
                    Empezá gratis hoy
                </h3>

                <p class="text-slate-300 text-sm leading-relaxed mb-8">
                    Solo necesitás crear tu cuenta para acceder al plan Starter.
                    Sin tarjeta. Sin pagos.
                </p>

                {{-- BOTÓN LOGIN --}}
                <a href="{{ route('login') }}"
                    class="block w-full py-5 rounded-xl bg-emerald-600 text-white font-bold text-xs uppercase tracking-widest text-center hover:bg-emerald-500 hover:shadow-lg hover:shadow-emerald-500/30 transition-all">
                    Iniciar sesión
                </a>

                {{-- Si querés también botón de registro --}}
                <a href="{{ route('register') }}"
                    class="block w-full mt-4 py-5 rounded-xl border border-emerald-400 text-emerald-400 font-bold text-xs uppercase tracking-widest text-center hover:bg-emerald-400 hover:text-white transition-all">
                    Crear cuenta gratis
                </a>

            </div>

        </section>


        {{-- INFO EXTRA --}}
        <section class="max-w-3xl mx-auto text-center mt-24 border-t border-slate-200 pt-16">

            <h4 class="text-xl font-serif text-slate-900 mb-4">
                Sin costo. Sin compromiso.
            </h4>

            <p class="text-slate-500 text-sm leading-relaxed">
                Ideal para comenzar tu camino como desarrollador
                y conocer nuestra plataforma antes de avanzar a planes superiores.
            </p>

        </section>

    </main>
</x-layout>