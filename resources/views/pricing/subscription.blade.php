<x-layout>
    <x-slot:title>Planes de Suscripción</x-slot:title>

    <main class="container mx-auto px-6 py-20">

        {{-- ENCABEZADO --}}
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="bg-indigo-50 text-indigo-600 px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-[0.2em] border border-indigo-100">
                Invierte en tu futuro
            </span>
            <h2 class="text-5xl md:text-6xl font-serif text-slate-900 mt-8 mb-6 leading-tight">
                Elige el plan perfecto para tu carrera
            </h2>
            <p class="text-slate-500 text-lg font-light leading-relaxed">
                Desde tus primeras líneas de código hasta arquitecturas complejas. <br class="hidden md:block">
                Cancela o cambia de plan cuando quieras.
            </p>
        </div>


        {{-- GRID DE PRECIOS --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto items-center">

            {{-- PLAN 1: PRINCIPIANTE --}}
            <div class="bg-white border border-slate-200 rounded-[2.5rem] p-10 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 relative group">
                <div class="mb-6">
                    <h3 class="text-slate-500 font-bold text-xs uppercase tracking-[0.2em] mb-4">Starter</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl font-serif text-slate-900">Gratis</span>
                    </div>
                    <p class="text-slate-400 text-sm mt-4">Ideal para curiosos y primeros pasos.</p>
                </div>



                <a href="{{ auth()->check() ? route('user.cursos') : ('login') }}" class="block w-full py-4 rounded-xl border-2 border-slate-100 text-slate-600 font-bold text-xs uppercase tracking-widest text-center hover:border-slate-900 hover:text-slate-900 transition-colors">
                    <!-- Container para o botão de pagamento -->
                </a>

                <div id="walletBrick_container"></div>
                <ul class="mt-8 space-y-4">
                    <li class="flex items-center gap-3 text-sm text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Acceso a artículos básicos
                    </li>
                    <li class="flex items-center gap-3 text-sm text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        2 Cursos de Nivel 1
                    </li>
                    <li class="flex items-center gap-3 text-sm text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Comunidad de Discord (Lectura)
                    </li>
                </ul>
            </div>

            {{-- PLAN 2: INTERMEDIO (DESTACADO) --}}
            <div class="bg-slate-900 text-white rounded-[2.5rem] p-10 shadow-2xl shadow-indigo-200 transform scale-105 z-10 relative border border-slate-800">
                <div class="absolute top-0 right-0 bg-gradient-to-r from-indigo-500 to-purple-500 text-white text-[9px] font-black uppercase tracking-widest py-2 px-6 rounded-bl-2xl rounded-tr-2xl">
                    Más Popular
                </div>

                <div class="mb-8">
                    <h3 class="text-indigo-300 font-bold text-xs uppercase tracking-[0.2em] mb-4">Developer Pro</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-5xl font-serif">$29</span>
                        <span class="text-slate-400 text-sm">/ mes</span>
                    </div>
                    <p class="text-slate-400 text-sm mt-4">Para quienes buscan trabajo activamente.</p>
                </div>

                <a href="#" class="block w-full py-5 rounded-xl bg-indigo-600 text-white font-bold text-xs uppercase tracking-widest text-center hover:bg-indigo-500 hover:shadow-lg hover:shadow-indigo-500/30 transition-all">
                    Obtener Acceso Pro
                </a>

                <div class="mt-8 pt-8 border-t border-slate-800">
                    <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold mb-4">Todo lo de Starter, más:</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3 text-sm text-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <strong>Acceso ilimitado</strong> a cursos Nivel 1 y 2
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Descarga de código fuente
                        </li>
                        <li class="flex items-center gap-3 text-sm text-slate-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-indigo-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Certificados de finalización
                        </li>
                    </ul>
                </div>
            </div>

            {{-- PLAN 3: AVANZADO --}}

            <div class="bg-white border border-slate-200 rounded-[2.5rem] p-10 hover:shadow-xl transition-all duration-300 hover:-translate-y-2 group">
                <div class="mb-6">
                    <h3 class="text-emerald-600 font-bold text-xs uppercase tracking-[0.2em] mb-4">Senior Elite</h3>
                    <div class="flex items-baseline gap-1">
                        <span class="text-4xl font-serif text-slate-900">$59</span>
                        <span class="text-slate-400 text-sm">/ mes</span>
                    </div>
                    <p class="text-slate-400 text-sm mt-4">Maestría técnica y arquitectura.</p>
                </div>

                <a href="#" class="block w-full py-4 rounded-xl border-2 border-slate-100 text-slate-600 font-bold text-xs uppercase tracking-widest text-center hover:border-emerald-500 hover:text-emerald-600 transition-colors">
                    Contactar Ventas
                </a>

                <ul class="mt-8 space-y-4">
                    <li class="flex items-center gap-3 text-sm text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <strong>Todo el catálogo</strong> (Niveles 1, 2 y 3)
                    </li>
                    <li class="flex items-center gap-3 text-sm text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 text-emerald-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Mentoría 1 a 1 mensual
                    </li>
                </ul>
            </div>
        </div>

        {{-- SECCIÓN DE GARANTÍA --}}
        <div class="mt-24 text-center border-t border-slate-100 pt-16">
            <p class="text-slate-400 text-sm font-serif italic">
                ¿Tienes dudas? Todos los planes pagos incluyen una garantía de devolución de 14 días.
                <a href="#" class="text-slate-900 underline decoration-indigo-300 decoration-2 underline-offset-4 hover:text-indigo-600">Hablemos.</a>
            </p>
        </div>

    </main>
</x-layout>