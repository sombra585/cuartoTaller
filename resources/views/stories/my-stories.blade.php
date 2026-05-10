<x-app-layout>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            {{-- HEADER --}}
            <div class="mb-10">

                <span class="badge mb-4">
                    PANEL PERSONAL
                </span>

                <h1 class="text-5xl font-black text-white tracking-tighter">
                    Mis Historias
                </h1>

                <p class="text-gray-400 mt-3 text-sm">
                    Administra las historias que has creado dentro del sistema narrativo.
                </p>

            </div>

            @if($stories->count() > 0)

                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                    @foreach($stories as $story)

                        <div class="story-card overflow-hidden p-0 flex flex-col justify-between group hover:-translate-y-2 transition-all duration-300">

                            {{-- GIF --}}
                            <div class="relative h-44 overflow-hidden">

                                <img src="{{ asset('img/7.gif') }}"
                                     alt="Mi historia"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">

                                {{-- Overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-[#050814] via-[#050814]/30 to-transparent"></div>

                                {{-- Badge --}}
                                <div class="absolute top-4 right-4 px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/20 backdrop-blur-md">

                                    <span class="text-[10px] uppercase tracking-widest text-emerald-400 font-bold">
                                        Tu historia
                                    </span>

                                </div>

                                {{-- TITULO --}}
                                <div class="absolute bottom-0 left-0 w-full p-6">

                                    <h2 class="text-3xl font-black text-white leading-tight drop-shadow-[0_4px_15px_rgba(0,0,0,0.8)] group-hover:text-emerald-400 transition-all">

                                        {{ $story->title }}

                                    </h2>

                                </div>

                            </div>

                            {{-- CONTENIDO --}}
                            <div class="p-6 flex flex-col flex-1 justify-between">

                                <div>

                                    <p class="text-gray-400 leading-relaxed text-sm line-clamp-5">

                                        {{ Str::limit($story->content, 180) }}

                                    </p>

                                </div>

                                {{-- FOOTER --}}
                                <div class="mt-6 flex items-center justify-between">

                                    <div>

                                        <p class="text-[10px] uppercase tracking-[0.25em] text-gray-500 font-bold mb-1">
                                            Creada
                                        </p>

                                        <p class="text-emerald-400 text-sm font-bold">
                                            {{ $story->created_at->diffForHumans() }}
                                        </p>

                                    </div>

                                    <div class="w-11 h-11 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center">

                                        <svg class="w-5 h-5 text-white/70"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M12 8v4l3 3">
                                            </path>

                                        </svg>

                                    </div>

                                </div>

                                {{-- BOTONES --}}
                                <div class="grid grid-cols-3 gap-3 mt-7">

                                    {{-- VER --}}
                                    <a href="/stories/{{ $story->id }}"
                                       class="text-center py-3 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition text-sm font-bold text-white">

                                        Ver

                                    </a>

                                    {{-- EDITAR --}}
                                    <a href="/stories/{{ $story->id }}/edit"
                                       class="text-center py-3 rounded-2xl bg-blue-500/10 border border-blue-500/20 text-blue-400 hover:bg-blue-500/20 transition text-sm font-bold">

                                        Editar

                                    </a>

                                    {{-- ELIMINAR --}}
                                    <form method="POST"
                                          action="/stories/{{ $story->id }}">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="w-full py-3 rounded-2xl bg-red-500/10 border border-red-500/20 text-red-400 hover:bg-red-500/20 transition text-sm font-bold">

                                            Eliminar

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="glass-panel text-center py-20">

                    <h2 class="text-3xl font-black text-white mb-4">
                        No has creado historias
                    </h2>

                    <p class="text-gray-500 mb-8 text-sm">
                        Comienza escribiendo tu primera narrativa.
                    </p>

                    <a href="/stories/create"
                       class="btn-primary">

                        Crear Historia

                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>