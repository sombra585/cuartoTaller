<x-app-layout>

    <div class="py-12">

        <div class="max-w-5xl mx-auto px-6">

            {{-- HISTORIA --}}
            <div class="glass-panel mb-10">

                {{-- PORTADA --}}
                @if($story->cover)

                    <div class="mb-8">

                        <img
                            src="{{ asset('storage/' . $story->cover) }}"
                            class="w-full h-[420px] object-cover rounded-3xl"
                        >

                    </div>

                @endif

                {{-- HEADER --}}
                <div class="border-b border-white/5 pb-5 mb-">

                    <h1 class="text-5xl font-black text-white leading-tight">
                        {{ $story->title }}
                    </h1>

                    <p class="text-sm text-emerald-400 mt-3 font-bold">
                        {{ $story->user->name }}
                    </p>

                    <p class="text-[11px] uppercase tracking-[0.2em] text-emerald-400/70 mt-3 font-bold">
                        {{ $story->genre }}
                    </p>

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

                    </div>

                    <span class="text-[10px] uppercase tracking-widest bg-blue-500/10 text-blue-400 px-4 py-2 rounded-full border border-blue-500/20">
                        {{ $story->fragments->count() }} Fragmentos
                    </span>

                </div>

                @if($story->fragments->count() > 0)

                    <div class="space-y-6">

                                                @foreach($story->fragments as $fragment)

                            <div class="story-card relative overflow-hidden p-0 border border-white/10">

                                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/[0.03] via-transparent to-blue-500/[0.03]"></div>

                                <div class="relative p-5">

                                    {{-- HEADER (más compacto) --}}
                                    <div class="flex items-center justify-between mb-2">

                                        <div class="flex items-center gap-3">

                                            <div class="w-11 h-11 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center">

                                                <span class="text-emerald-400 font-black text-sm">
                                                    {{ strtoupper(substr($fragment->user->name, 0, 1)) }}
                                                </span>

                                            </div>

                                            <div>

                                                <p class="text-white font-bold text-sm leading-none">
                                                    {{ $fragment->user->name }}
                                                </p>

                                                <p class="text-gray-500 text-[11px] mt-1 uppercase tracking-[0.15em]">
                                                    {{ $fragment->created_at->diffForHumans() }}
                                                </p>

                                            </div>

                                        </div>

                                        <div class="px-3 py-1 rounded-lg bg-emerald-500/10 border border-emerald-500/20">

                                            <span class="text-[10px] uppercase tracking-[0.2em] text-emerald-400 font-bold">
                                                Fragmento
                                            </span>

                                        </div>

                                    </div>

                                    {{-- TEXTO --}}
                                    <div class="relative mt-1">

                                        {{-- LINEA VERTICAL --}}
                                        <div class="absolute left-0 top-0 bottom-0 w-[2px] bg-gradient-to-b from-emerald-500/60 to-transparent rounded-full"></div>

                                        <p class="text-gray-200 leading-7 whitespace-pre-line text-[15px] pl-4">

                                            {{ $fragment->content }}

                                        </p>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="glass-panel text-center py-16">

                        <h3 class="text-2xl font-black text-white mb-3">
                            Nadie ha continuado esta historia
                        </h3>

                    </div>

                @endif

            </div>

            {{-- FORMULARIO --}}
            <div class="glass-panel">

                <div class="mb-8">

                    <h2 class="text-3xl font-black text-white">
                        Continuar Historia
                    </h2>

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

                    <button class="btn-primary">

                        Publicar Continuación

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>