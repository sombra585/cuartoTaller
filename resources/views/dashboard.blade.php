<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center gap-3">

            <div class="w-1 h-6 bg-emerald-500 rounded-full shadow-[0_0_10px_#10b981]"></div>

            <h2 class="font-black text-xl text-white uppercase tracking-tighter">
                {{ __('Terminal de Historias') }}
            </h2>

        </div>

    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- GIF PRINCIPAL --}}
            <div class="relative overflow-hidden rounded-[2.5rem] border border-white/10">

                <img
                    src="{{ asset('img/1.gif') }}"
                    class="w-full h-[280px] object-cover"
                >

                <div class="absolute inset-0 bg-black/50"></div>

                <div class="absolute bottom-10 left-10">

                    <h1 class="text-5xl font-black text-white mb-3">
                        StoryVerse
                    </h1>

                    <p class="text-gray-300 text-lg">
                        Crea, explora y continúa historias infinitas.
                    </p>

                </div>

            </div>

            {{-- Grid de Acciones --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Crear historia --}}
                <a href="/stories/create"
                   class="story-card group bg-[#0b0f1a]/40 border border-white/10 p-6 rounded-[2rem] block transition-all duration-300 hover:border-emerald-500/50 hover:-translate-y-1">

                    <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-emerald-500 transition-all duration-300">

                        <svg class="w-6 h-6 text-emerald-500 group-hover:text-[#050814]"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 4v16m8-8H4"></path>

                        </svg>

                    </div>

                    <h3 class="text-white font-black text-xl mb-2">
                        Crear Historia
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed">
                        Inicia un nuevo universo narrativo y deja que otros continúen tu relato.
                    </p>

                </a>

                {{-- Explorar historias --}}
                <a href="/stories"
                   class="story-card group bg-[#0b0f1a]/40 border border-white/10 p-6 rounded-[2rem] block transition-all duration-300 hover:border-blue-500/50 hover:-translate-y-1">

                    <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-blue-500 transition-all duration-300">

                        <svg class="w-6 h-6 text-blue-500 group-hover:text-white"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>

                        </svg>

                    </div>

                    <h3 class="text-white font-black text-xl mb-2">
                        Explorar Historias
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed">
                        Descubre relatos creados por otros usuarios y continúa la historia.
                    </p>

                </a>

                {{-- Mis historias --}}
                <a href="/my-stories"
                   class="story-card group bg-[#0b0f1a]/40 border border-white/10 p-6 rounded-[2rem] block transition-all duration-300 hover:border-white/40 hover:-translate-y-1">

                    <div class="w-12 h-12 bg-white/5 rounded-xl flex items-center justify-center mb-6 group-hover:bg-white transition-all duration-300">

                        <svg class="w-6 h-6 text-gray-400 group-hover:text-[#050814]"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>

                        </svg>

                    </div>

                    <h3 class="text-white font-black text-xl mb-2">
                        Mis Historias
                    </h3>

                    <p class="text-gray-500 text-sm leading-relaxed">
                        Administra tus historias creadas y las continuaciones realizadas.
                    </p>

                </a>

            </div>

            {{-- Monitor --}}
            <div class="bg-[#0b0f1a]/60 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-md">

                <div class="flex items-center justify-between mb-6">

                    <h4 class="text-[10px] font-black uppercase tracking-[0.4em] text-emerald-500">
                        Monitor de Actividad
                    </h4>

                    <span class="px-4 py-2 bg-emerald-500/10 text-emerald-400 text-[10px] font-bold rounded-full border border-emerald-500/20">
                        ● SISTEMA ONLINE
                    </span>

                </div>

                <p class="text-gray-400 text-base leading-relaxed">
                    {{ __("Has iniciado sesión correctamente. La terminal está lista para recibir nuevos datos narrativos.") }}
                </p>

            </div>

        </div>

    </div>

</x-app-layout>