<x-layout>
    <x-slot:title>Senior Elite</x-slot:title>

    <main class="min-h-screen bg-gradient-to-b from-indigo-50 to-white py-24 px-6">

        {{-- HERO --}}
        <section class="max-w-5xl mx-auto text-center mb-20">

            <span class="inline-block bg-indigo-100 text-indigo-600 px-5 py-2 rounded-full text-xs font-black uppercase tracking-[0.2em] border border-indigo-200">
                Experiencia Premium
            </span>

            <h1 class="text-5xl md:text-6xl font-serif text-slate-900 mt-8 mb-6 leading-tight">
                Senior Elite
            </h1>

            <p class="text-slate-500 text-lg max-w-2xl mx-auto leading-relaxed">
                Acceso total a todos los cursos, mentorías privadas y recursos
                avanzados para convertirte en desarrollador Senior.
            </p>

            <div class="mt-10">
                <span class="text-6xl font-serif text-slate-900">$79</span>
                <span class="text-slate-400 text-lg">/ mes</span>
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
                        <div class="w-6 h-6 bg-indigo-500 rounded-full mt-1"></div>
                        Acceso ilimitado a todos los cursos (Nivel 1, 2 y 3)
                    </li>

                    <li class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-indigo-500 rounded-full mt-1"></div>
                        Mentorías privadas mensuales
                    </li>

                    <li class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-indigo-500 rounded-full mt-1"></div>
                        Revisión personalizada de CV y portfolio
                    </li>

                    <li class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-indigo-500 rounded-full mt-1"></div>
                        Acceso anticipado a nuevos cursos
                    </li>

                </ul>
            </div>


            {{-- CAJA --}}
            <div class="bg-slate-900 text-white rounded-[2rem] p-12 shadow-2xl shadow-indigo-200">

                <h3 class="text-2xl font-serif mb-6">
                    Lleva tu carrera al siguiente nivel
                </h3>

                <p class="text-slate-300 text-sm leading-relaxed mb-8">
                    Diseñado para quienes quieren destacarse
                    y acelerar su crecimiento profesional.
                </p>

                <div id="walletBrick_container"></div>

                <p class="text-slate-400 text-xs text-center mt-6">
                    Pago seguro procesado por MercadoPago
                </p>

            </div>

        </section>


        {{-- GARANTÍA --}}
        <section class="max-w-3xl mx-auto text-center mt-24 border-t border-slate-200 pt-16">

            <h4 class="text-xl font-serif text-slate-900 mb-4">
                Garantía de 14 días
            </h4>

            <p class="text-slate-500 text-sm leading-relaxed">
                Si el plan no cumple tus expectativas,
                te devolvemos el dinero sin preguntas.
            </p>

        </section>

    </main>
</x-layout>