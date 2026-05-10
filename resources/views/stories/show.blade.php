<x-app-layout>

    <div class="py-12">

        <div class="max-w-5xl mx-auto px-6">

            {{-- HISTORIA PRINCIPAL --}}
            <div class="glass-panel mb-10">

                {{-- CABECERA --}}
                <div class="border-b border-white/5 pb-5 mb-5">

                    <div class="flex items-center justify-between flex-wrap gap-4">

                        <div>

                            <h1 class="text-5xl font-black text-white leading-tight">
                                {{ $story->title }}
                            </h1>

                            <p class="text-sm text-emerald-400 mt-2">
                                Creada por
                                <span class="font-bold">
                                    {{ $story->user->name }}
                                </span>
                            </p>

                        </div>

                        <span class="text-[10px] uppercase tracking-[0.25em] bg-emerald-500/10 text-emerald-400 px-4 py-2 rounded-full border border-emerald-500/20">
                            Historia Activa
                        </span>

                    </div>

                </div>

                {{-- CONTENIDO --}}
                <div>

                    <p class="text-gray-300 text-[15px] leading-8 whitespace-pre-line">
                        {{ $story->content }}
                    </p>

                </div>

            </div>

            {{-- CONTINUACIONES --}}
            <div class="mb-12">

                <div class="flex items-center justify-between mb-6">

                    <div>

                        <h2 class="text-3xl font-black text-white">
                            Continuaciones
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Usuarios expandiendo la narrativa
                        </p>

                    </div>

                    <span class="text-[10px] uppercase tracking-widest bg-blue-500/10 text-blue-400 px-4 py-2 rounded-full border border-blue-500/20">
                        {{ $story->fragments->count() }} Fragmentos
                    </span>

                </div>

                @if($story->fragments->count() > 0)

                    <div class="space-y-6">

                        @foreach($story->fragments as $fragment)

                            <div class="story-card">

                                {{-- USER --}}
                                <div class="flex items-center justify-between mb-4">

                                    <div>

                                        <p class="text-white font-bold">
                                            {{ $fragment->user->name }}
                                        </p>

                                        <p class="text-gray-500 text-xs">
                                            {{ $fragment->created_at->diffForHumans() }}
                                        </p>

                                    </div>

                                    <span class="text-[10px] uppercase tracking-widest bg-white/5 text-gray-400 px-3 py-1 rounded-full">
                                        Continuación
                                    </span>

                                </div>

                                {{-- TEXTO --}}
                                <p class="text-gray-300 leading-7 whitespace-pre-line">
                                    {{ $fragment->content }}
                                </p>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="glass-panel text-center py-16">

                        <h3 class="text-2xl font-black text-white mb-3">
                            Nadie ha continuado esta historia
                        </h3>

                        <p class="text-gray-500">
                            Sé el primero en expandir esta narrativa.
                        </p>

                    </div>

                @endif

            </div>

            {{-- FORMULARIO --}}
            <div class="glass-panel">

                <div class="mb-8">

                    <h2 class="text-3xl font-black text-white">
                        Continuar Historia
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Añade un nuevo fragmento a la narrativa.
                    </p>

                </div>

                <form method="POST"
                      action="/stories/{{ $story->id }}/fragment">

                    @csrf

                    <div class="mb-6">

                        <label class="block text-emerald-400 text-xs uppercase tracking-[0.2em] mb-3 font-bold">
                            Tu continuación
                        </label>

                        <textarea
                            name="content"
                            rows="8"
                            placeholder="Escribe cómo continúa la historia..."
                            class="w-full bg-[#0d121f] border border-white/10 rounded-2xl px-6 py-5 text-white resize-none focus:outline-none focus:border-emerald-500/40 focus:ring-4 focus:ring-emerald-500/5 transition"
                        ></textarea>

                    </div>

                    <button
                        class="btn-primary">

                        Publicar Continuación

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>