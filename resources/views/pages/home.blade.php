<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historias Continuas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body class="bg-[#050814] text-white antialiased">

    {{-- 1. NAVBAR --}}
    @include('partials.navbar')

    {{-- Fondo decorativo global --}}
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <div class="absolute w-[1000px] h-[1000px] bg-emerald-500/5 blur-[150px] rounded-full -top-1/4 -left-1/4"></div>
        <div class="absolute w-[800px] h-[800px] bg-blue-600/5 blur-[150px] rounded-full -bottom-1/4 -right-1/4"></div>
    </div>

    {{-- 2. CONTENIDO PRINCIPAL --}}
    <main class="relative pt-32">
        
        {{-- HERO --}}
        <section id="inicio" class="max-w-7xl mx-auto px-6 py-20 grid lg:grid-cols-12 gap-16 items-center">
            <div class="lg:col-span-7 space-y-8">
                <div class="badge">
                    <span class="pulse"></span>
                    Narrativa colaborativa en tiempo real
                </div>
                <h1 class="text-6xl lg:text-7xl font-black leading-tight tracking-tighter">
                    Historias que <br>
                    <span class="text-emerald-400">evolucionan</span> <br>
                    sin control
                </h1>
                <p class="text-gray-400 text-lg max-w-xl leading-relaxed">
                    Cada usuario contribuye a un mundo narrativo vivo. Sin autor único. Sin final fijo.
                </p>
                <div class="flex gap-4">
                    <a href="{{ route('register') }}" class="btn-primary">Crear cuenta</a>
                    <a href="{{ route('login') }}" class="btn-outline">Iniciar sesión</a>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="glass-panel">
                    <div class="panel-header border-b border-white/5 pb-4 mb-6">
                        <span class="text-emerald-400 font-mono text-[10px] tracking-[0.3em]">SISTEMA_ACTIVO</span>
                    </div>
                    <div class="space-y-4">
                        <div class="panel-row">
                            <span class="text-gray-500">Estado</span>
                            <span class="text-emerald-400">Activo</span>
                        </div>
                        <div class="panel-row">
                            <span class="text-gray-500">Historias</span>
                            <span class="text-white font-bold">{{ isset($stories) ? $stories->count() : '0' }}</span>
                        </div>
                        <div class="panel-row border-none">
                            <span class="text-gray-500">Última Actividad</span>
                            <span class="text-white">
                                {{ (isset($stories) && $stories->count() > 0) ? $stories->first()->created_at->diffForHumans() : 'Sincronizando' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- FUNCIONAMIENTO --}}
        <section id="funcionamiento" class="max-w-7xl mx-auto px-6 py-32">
            <h2 class="text-4xl font-bold mb-16">Cómo funciona</h2>
            <div class="grid md:grid-cols-3 gap-12">
                <div class="space-y-4 border-l-2 border-emerald-500/20 pl-8 relative">
                    <div class="absolute -left-[9px] top-0 w-4 h-4 bg-emerald-500 rounded-full shadow-[0_0_10px_#10b981]"></div>
                    <h3 class="text-xl font-bold">Inicio libre</h3>
                    <p class="text-gray-400 text-sm">Las historias comienzan sin estructura definida.</p>
                </div>
                <div class="space-y-4 border-l-2 border-emerald-500/20 pl-8 relative">
                    <div class="absolute -left-[9px] top-0 w-4 h-4 bg-emerald-500 rounded-full shadow-[0_0_10px_#10b981]"></div>
                    <h3 class="text-xl font-bold">Colaboración</h3>
                    <p class="text-gray-400 text-sm">Cualquier usuario puede continuar la historia.</p>
                </div>
                <div class="space-y-4 border-l-2 border-emerald-500/20 pl-8 relative">
                    <div class="absolute -left-[9px] top-0 w-4 h-4 bg-emerald-500 rounded-full shadow-[0_0_10px_#10b981]"></div>
                    <h3 class="text-xl font-bold">Evolución infinita</h3>
                    <p class="text-gray-400 text-sm">No existe final, solo transformación constante.</p>
                </div>
            </div>
        </section>

        {{-- HISTORIAS --}}
        <section id="historias" class="max-w-7xl mx-auto px-6 py-32 border-t border-white/5">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-4xl font-bold">Historias activas</h2>
                    <p class="text-gray-500 mt-2">Contenido generado en tiempo real</p>
                </div>
                <div class="text-emerald-400 text-[10px] font-bold uppercase tracking-widest bg-emerald-500/10 px-4 py-2 rounded-full border border-emerald-500/20">
                    ● En vivo
                </div>
            </div>

            @if(isset($stories) && $stories->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($stories as $story)
                        <div class="story-card group">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-lg font-bold group-hover:text-emerald-400 transition-colors">{{ $story->title }}</h3>
                                <span class="text-[10px] text-gray-600 uppercase font-mono">{{ $story->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-gray-400 text-sm line-clamp-3 leading-relaxed">
                                {{ $story->last_fragment ?? 'Sin contenido aún...' }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state text-center py-20 border-2 border-dashed border-white/5 rounded-[3rem]">
                    <h3 class="text-xl font-bold">No hay historias aún</h3>
                    <p class="text-gray-500 mt-2">Sé el primero en escribir el futuro.</p>
                </div>
            @endif
        </section>

    </main>

    {{-- 3. FOOTER --}}
    @include('partials.footer')

</body>
</html>