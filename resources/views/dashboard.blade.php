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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Grid de Acciones --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                {{-- Crear historia --}}
                <a href="#" class="story-card group bg-[#0b0f1a]/40 border border-white/10 p-6 rounded-[2rem] block transition-all hover:border-emerald-500/50">
                    <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center mb-6 group-hover:bg-emerald-500 transition-all duration-300">
                        <svg class="w-5 h-5 text-emerald-500 group-hover:text-[#050814]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-1">Crear Historia</h3>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Inicia un nuevo mundo</p>
                </a>

                {{-- Explorar historias --}}
                <a href="#" class="story-card group bg-[#0b0f1a]/40 border border-white/10 p-6 rounded-[2rem] block transition-all hover:border-blue-500/50">
                    <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-500 transition-all duration-300">
                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-1">Explorar</h3>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Busca nuevos relatos</p>
                </a>

                {{-- Continuar historias --}}
                <a href="#" class="story-card group bg-[#0b0f1a]/40 border border-white/10 p-6 rounded-[2rem] block transition-all hover:border-purple-500/50">
                    <div class="w-10 h-10 bg-purple-500/10 rounded-lg flex items-center justify-center mb-6 group-hover:bg-purple-500 transition-all duration-300">
                        <svg class="w-5 h-5 text-purple-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-1">Continuar</h3>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Añade tu fragmento</p>
                </a>

                {{-- Mis historias --}}
                <a href="#" class="story-card group bg-[#0b0f1a]/40 border border-white/10 p-6 rounded-[2rem] block transition-all hover:border-white/40">
                    <div class="w-10 h-10 bg-white/5 rounded-lg flex items-center justify-center mb-6 group-hover:bg-white transition-all duration-300">
                        <svg class="w-5 h-5 text-gray-400 group-hover:text-[#050814]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-1">Mis Historias</h3>
                    <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Gestiona tu legado</p>
                </a>

            </div>

            {{-- Monitor de Actividad --}}
            <div class="bg-[#0b0f1a]/60 border border-white/5 rounded-[2.5rem] p-8 backdrop-blur-md">
                <div class="flex items-center justify-between mb-6">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.4em] text-emerald-500">Monitor de Actividad</h4>
                    <span class="px-3 py-1 bg-emerald-500/10 text-emerald-400 text-[9px] font-bold rounded-full border border-emerald-500/20">SISTEMA ONLINE</span>
                </div>
                <p class="text-gray-400 text-sm font-medium">
                    {{ __("Has iniciado sesión correctamente. La terminal está lista para recibir nuevos datos narrativos.") }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>