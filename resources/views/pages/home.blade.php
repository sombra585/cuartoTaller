<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Historias Continuas</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="{{ asset('css/home.css') }}">

</head>

<body class="bg-[#050814] text-white antialiased overflow-x-hidden">

    {{-- NAVBAR --}}
    @include('partials.navbar')

    {{-- FONDO GLOBAL --}}
 

    <main class="relative">

        {{-- HERO --}}
        <section id="inicio" class="relative min-h-screen flex items-center overflow-hidden">

            {{-- GIF --}}
            <img src="{{ asset('img/6.gif') }}"
                 class="absolute inset-0 w-full h-full object-cover opacity-20">

            {{-- OSCURECEDOR --}}
            <div class="absolute inset-0 bg-gradient-to-b from-[#050814]/80 via-[#050814]/70 to-[#050814]"></div>

            {{-- EFECTO --}}
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(16,185,129,0.12),transparent_40%)]"></div>

            {{-- CONTENIDO --}}
            <div class="relative max-w-7xl mx-auto px-6 py-32 w-full">

                <div class="grid lg:grid-cols-12 gap-16 items-center">

                    {{-- TEXTO --}}
                    <div class="lg:col-span-7">

                        <div class="badge mb-8">

                            <span class="pulse"></span>

                            Narrativa colaborativa en tiempo real

                        </div>

                        <h1 class="text-6xl lg:text-8xl font-black leading-none tracking-tighter mb-8">

                            Historias que

                            <span class="block text-emerald-400 mt-2">
                                sobreviven
                            </span>

                            <span class="block mt-2">
                                a sus autores
                            </span>

                        </h1>

                        <p class="text-gray-300 text-xl leading-relaxed max-w-2xl mb-10">

                            Un universo narrativo donde cada usuario altera
                            el destino de una historia viva.

                        </p>

                        <div class="flex gap-5 flex-wrap">

                            <a href="{{ route('register') }}"
                               class="btn-primary">

                                Crear cuenta

                            </a>

                            <a href="{{ route('login') }}"
                               class="btn-outline">

                                Iniciar sesión

                            </a>

                        </div>

                    </div>

                    {{-- PANEL --}}
                    <div class="lg:col-span-5">

                        <div class="glass-panel backdrop-blur-2xl bg-[#050814]/40 border border-white/10">

                            <div class="flex justify-between items-center mb-8">

                                <div>

                                    <p class="text-[10px] uppercase tracking-[0.35em] text-emerald-400 font-bold mb-2">

                                        SISTEMA

                                    </p>

                                    <h3 class="text-3xl font-black">

                                        StoryVerse

                                    </h3>

                                </div>

                                <div class="w-3 h-3 rounded-full bg-emerald-400 shadow-[0_0_15px_#10b981]"></div>

                            </div>

                            <div class="space-y-5">

                                <div class="panel-row">

                                    <span class="text-gray-500">
                                        Estado
                                    </span>

                                    <span class="text-emerald-400 font-bold">
                                        Online
                                    </span>

                                </div>

                                <div class="panel-row">

                                    <span class="text-gray-500">
                                        Historias activas
                                    </span>

                                    <span class="text-white font-black text-xl">

                                        {{ isset($stories) ? $stories->count() : '0' }}

                                    </span>

                                </div>

                                <div class="panel-row border-none">

                                    <span class="text-gray-500">
                                        Última actividad
                                    </span>

                                    <span class="text-white">

                                        {{ (isset($stories) && $stories->count() > 0) ? $stories->first()->created_at->diffForHumans() : 'Sin actividad' }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>
<section id="funcionamiento" class="max-w-7xl mx-auto px-6 py-32">

    {{-- HEADER --}}
    <div class="mb-20">

        <span class="badge mb-5">
            SISTEMA CENTRAL
        </span>

        <h2 class="text-5xl font-black tracking-tighter mb-4">
            Cómo funciona
        </h2>

        <p class="text-gray-400 text-lg max-w-2xl leading-relaxed">
            El sistema permite crear historias vivas donde cada usuario aporta fragmentos que cambian el rumbo de la narrativa en tiempo real.
        </p>

    </div>

    {{-- PASOS --}}
    <div class="grid md:grid-cols-3 gap-10">

        {{-- PASO 1 --}}
        <div class="glass-panel relative overflow-hidden group">

            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent opacity-0 group-hover:opacity-100 transition"></div>

            <div class="relative">

                <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 flex items-center justify-center mb-6">
                    <span class="text-emerald-400 font-black text-xl">01</span>
                </div>

                <h3 class="text-2xl font-black mb-4">
                    Creación libre
                </h3>

                <p class="text-gray-400 leading-relaxed">
                    Cualquier usuario puede iniciar una historia sin reglas, sin estructura y sin límites predefinidos.
                </p>

            </div>

        </div>

        {{-- PASO 2 --}}
        <div class="glass-panel relative overflow-hidden group">

            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent opacity-0 group-hover:opacity-100 transition"></div>

            <div class="relative">

                <div class="w-14 h-14 rounded-2xl bg-blue-500/10 flex items-center justify-center mb-6">
                    <span class="text-blue-400 font-black text-xl">02</span>
                </div>

                <h3 class="text-2xl font-black mb-4">
                    Colaboración activa
                </h3>

                <p class="text-gray-400 leading-relaxed">
                    Otros usuarios pueden continuar la historia agregando nuevos fragmentos que alteran su dirección.
                </p>

            </div>

        </div>

        {{-- PASO 3 --}}
        <div class="glass-panel relative overflow-hidden group">

            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition"></div>

            <div class="relative">

                <div class="w-14 h-14 rounded-2xl bg-white/10 flex items-center justify-center mb-6">
                    <span class="text-white font-black text-xl">03</span>
                </div>

                <h3 class="text-2xl font-black mb-4">
                    Evolución infinita
                </h3>

                <p class="text-gray-400 leading-relaxed">
                    Las historias nunca terminan. Se transforman constantemente con cada nueva interacción.
                </p>

            </div>

        </div>

    </div>

</section>

        {{-- HISTORIAS ACTIVAS --}}
<section id="historias" class="max-w-7xl mx-auto px-6 py-32 border-t border-white/5">

    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row justify-between lg:items-end gap-8 mb-16">

        <div>

            <span class="badge mb-5">
                ARCHIVO GLOBAL
            </span>

            <h2 class="text-6xl font-black tracking-tighter">
                Historias activas
            </h2>

            <p class="text-gray-500 mt-4 text-lg">
                Explora universos narrativos creados por la comunidad.
            </p>

        </div>

        <div class="text-emerald-400 text-[10px] font-bold uppercase tracking-widest bg-emerald-500/10 px-5 py-3 rounded-full border border-emerald-500/20 h-fit">
            ● EN VIVO
        </div>

    </div>

            {{-- CONTENIDO --}}
            @if(isset($stories) && $stories->count() > 0)

                <div class="space-y-10">

                    @foreach($stories as $index => $story)

                        <a href="/stories/{{ $story->id }}"
                        class="group block">

                            <div class="relative overflow-hidden rounded-[2.5rem] border border-white/10 bg-[#0b0f1a]/70 backdrop-blur-xl">

                                <div class="grid lg:grid-cols-12">

                                    {{-- PAR: imagen izquierda --}}
                                    @if($index % 2 == 0)

                                        <div class="lg:col-span-4 relative min-h-[340px] overflow-hidden">

                                            <img src="{{ asset('img/6.gif') }}"
                                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-all duration-700 opacity-90">

                                            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-[#050814]"></div>

                                        </div>

                                        <div class="lg:col-span-8 p-10 flex flex-col justify-center">

                                            {{-- CONTENIDO --}}
                                            <div class="flex items-center gap-3 mb-5">

                                                <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_10px_#10b981]"></div>

                                                <span class="text-xs uppercase tracking-[0.25em] text-gray-500">

                                                    {{ $story->created_at->diffForHumans() }}

                                                </span>

                                            </div>

                                            <h3 class="text-5xl font-black mb-6 group-hover:text-emerald-400 transition-all">

                                                {{ $story->title }}

                                            </h3>

                                            <p class="text-gray-400 text-lg leading-relaxed mb-8">

                                                {{ Str::limit($story->content, 240) }}

                                            </p>

                                            <div class="flex items-center justify-between">

                                                <span class="text-gray-500 text-sm">

                                                    Creada por

                                                    <span class="text-white font-bold">
                                                        {{ $story->user->name ?? 'Usuario' }}
                                                    </span>

                                                </span>

                                                <span class="text-emerald-400 text-xs font-bold uppercase tracking-widest group-hover:translate-x-2 transition-all">

                                                    Abrir →

                                                </span>

                                            </div>

                                        </div>

                                    {{-- IMPAR: imagen derecha --}}
                                    @else

                                        <div class="lg:col-span-8 p-10 flex flex-col justify-center order-2 lg:order-1">

                                            <div class="flex items-center gap-3 mb-5">

                                                <div class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_10px_#10b981]"></div>

                                                <span class="text-xs uppercase tracking-[0.25em] text-gray-500">

                                                    {{ $story->created_at->diffForHumans() }}

                                                </span>

                                            </div>

                                            <h3 class="text-5xl font-black mb-6 group-hover:text-emerald-400 transition-all">

                                                {{ $story->title }}

                                            </h3>

                                            <p class="text-gray-400 text-lg leading-relaxed mb-8">

                                                {{ Str::limit($story->content, 240) }}

                                            </p>

                                            <div class="flex items-center justify-between">

                                                <span class="text-gray-500 text-sm">

                                                    Creada por

                                                    <span class="text-white font-bold">
                                                        {{ $story->user->name ?? 'Usuario' }}
                                                    </span>

                                                </span>

                                                <span class="text-emerald-400 text-xs font-bold uppercase tracking-widest group-hover:translate-x-2 transition-all">

                                                    Abrir →

                                                </span>

                                            </div>

                                        </div>

                                        <div class="lg:col-span-4 relative min-h-[340px] overflow-hidden order-1 lg:order-2">

                                            <img src="{{ asset('img/6.gif') }}"
                                                class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-all duration-700 opacity-90">

                                            <div class="absolute inset-0 bg-gradient-to-l from-transparent to-[#050814]"></div>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            @else

                <div class="glass-panel text-center py-24">

                    <h3 class="text-3xl font-black mb-4">
                        No hay historias aún
                    </h3>

                    <p class="text-gray-500">
                        Sé el primero en escribir el futuro.
                    </p>

                </div>

            @endif

        </section>

    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

</body>
</html>