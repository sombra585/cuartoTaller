<x-app-layout>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            {{-- HEADER --}}

            <form method="GET"
                action="/stories"
                class="glass-panel mb-10 p-5">

                <div class="flex flex-col md:flex-row gap-4">

                    <div class="flex-1">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Buscar entre mis historias..."
                        >

                    </div>

                    <button class="btn-primary">

                        Buscar

                    </button>

                </div>

            </form>

            <div class="flex justify-between items-end mb-10">

                <div>

                    <span class="badge mb-4">
                        HISTORIAS ACTIVAS
                    </span>

                    <h1 class="text-5xl font-black tracking-tighter text-white">
                        Explorar Historias
                    </h1>

                    <p class="text-gray-500 mt-3 text-sm">
                        Descubre relatos creados por la comunidad.
                    </p>

                </div>

            </div>

            @if($stories->count())

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($stories as $story)

                        <a href="/stories/{{ $story->id }}"
                           class="story-card group overflow-hidden block p-0 hover:-translate-y-2 transition-all duration-300">

                            {{-- PORTADA --}}
                            <div class="relative h-52 overflow-hidden">

                                <img
                                    src="{{ $story->cover && file_exists(public_path('storage/' . $story->cover))
                                        ? asset('storage/' . $story->cover)
                                        : asset('img/8.gif') }}"
                                    alt="Historia"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500"
                                >

                                {{-- OVERLAY --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-[#050814] via-[#050814]/30 to-transparent"></div>

                                {{-- FECHA --}}
                                <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-black/40 backdrop-blur-md border border-white/10">

                                    <span class="text-[10px] uppercase tracking-widest text-white font-bold">
                                        {{ $story->created_at->diffForHumans() }}
                                    </span>

                                </div>

                            </div>

                            {{-- CONTENIDO --}}
                            <div class="p-6 pt-5">

                                {{-- GÉNERO --}}
                                <div class="mb-3">

                                    <span class="text-[10px] uppercase tracking-[0.2em] text-emerald-400 font-bold">

                                        {{ $story->genre ?? 'Sin género' }}

                                    </span>

                                </div>

                                {{-- TITULO --}}
                                <h2 class="text-2xl font-black text-white mb-3 group-hover:text-emerald-400 transition-all leading-tight">

                                    {{ $story->title }}

                                </h2>

                                {{-- TEXTO --}}
                                <p class="text-gray-400 text-sm leading-relaxed line-clamp-4">

                                    {{ Str::limit($story->content, 140) }}

                                </p>

                                {{-- FOOTER --}}
                                <div class="mt-5 flex items-center justify-between">

                                    <div>

                                        <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500 font-bold mb-1">
                                            Creada por
                                        </p>

                                        <p class="text-emerald-400 text-sm font-bold">
                                            {{ $story->user?->name ?? 'Usuario' }}
                                        </p>

                                    </div>

                                    {{-- ICONO --}}
                                    <div class="w-11 h-11 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center group-hover:bg-emerald-500 transition-all duration-300">

                                        <svg class="w-5 h-5 text-emerald-400 group-hover:text-[#050814]"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M9 5l7 7-7 7">
                                            </path>

                                        </svg>

                                    </div>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                {{-- GIF --}}
                <div class="relative overflow-hidden rounded-[2.5rem] mb-10 border border-white/10">

                    <img
                        src="{{ asset('img/1.gif') }}"
                        class="w-full h-[280px] object-cover"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-[#050814] via-[#050814]/50 to-transparent"></div>

                </div>

                {{-- EMPTY STATE --}}
                <div class="glass-panel text-center py-24">

                    <h2 class="text-5xl font-black text-white mb-4 tracking-tight">

                        Historias aún no creadas

                    </h2>

                    <p class="text-gray-500 text-lg max-w-xl mx-auto leading-relaxed">

                        La comunidad todavía no ha comenzado ninguna narrativa.
                        Sé el primero en crear una historia épica.

                    </p>

                    <a href="/stories/create"
                       class="btn-primary mt-10 inline-flex">

                        Crear Historia

                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>