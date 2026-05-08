<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Historias Continuas') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
</head>

<body class="bg-[#050814] text-white min-h-screen flex items-center justify-center font-['Inter'] antialiased overflow-hidden">

    {{-- BACKGROUND (Luces nítidas sin sobrecargar) --}}
    <div class="fixed inset-0 -z-10">
        <div class="absolute w-[800px] h-[800px] bg-emerald-500/5 blur-[150px] rounded-full -top-[200px] -left-[200px]"></div>
        <div class="absolute w-[600px] h-[600px] bg-blue-600/5 blur-[150px] rounded-full -bottom-[200px] -right-[200px]"></div>
    </div>

    <div class="w-full max-w-lg px-6 relative py-12">
        
        {{-- BRAND --}}
        <div class="text-center mb-10">
            <a href="/" class="inline-flex flex-col items-center gap-4 group">
                <div class="w-16 h-16 bg-emerald-500 rounded-2xl flex items-center justify-center shadow-[0_0_30px_rgba(16,185,129,0.3)] group-hover:scale-105 transition-all duration-500">
                    <span class="text-[#050814] font-black text-3xl tracking-tighter">H</span>
                </div>
                <div>
                    <h1 class="text-2xl font-black tracking-tighter text-white uppercase group-hover:text-emerald-400 transition-colors">
                        Historias <span class="text-emerald-500">Continuas</span>
                    </h1>
                </div>
            </a>
        </div>

        {{-- CARD CON NITIDEZ MÁXIMA --}}
        <div class="relative">
            {{-- Resplandor sutil detrás de la card --}}
            <div class="absolute inset-0 bg-emerald-500/5 blur-3xl -z-10"></div>
            
            <div class="bg-[#0b0f1a]/80 backdrop-blur-md border border-white/10 rounded-[2.5rem] p-8 md:p-12 shadow-2xl">
                
                {{-- HEADER INTERNO --}}
                <div class="mb-10">
                    <h2 class="text-3xl font-black tracking-tight text-white mb-3">Portal de Acceso</h2>
                    <div class="h-1 w-10 bg-emerald-500 rounded-full mb-6"></div>
                    <p class="text-gray-400 text-sm leading-relaxed font-medium">
                        Tu contribución es vital para que el universo siga expandiéndose.
                    </p>
                </div>

                {{-- CONTENIDO DEL FORMULARIO (Slot de Laravel) --}}
                <div class="guest-content">
                    {{ $slot }}
                </div>

            </div>
        </div>

        {{-- FOOTER GUEST --}}
        <div class="mt-12 flex flex-col items-center gap-4">
            <div class="flex items-center gap-4 w-full">
                <span class="flex-1 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent"></span>
                <p class="text-[10px] uppercase tracking-[0.4em] font-bold text-gray-600">Sistema Seguro</p>
                <span class="flex-1 h-[1px] bg-gradient-to-r from-transparent via-white/10 to-transparent"></span>
            </div>
            <a href="/" class="text-[11px] font-bold text-emerald-500/50 hover:text-emerald-400 uppercase tracking-widest transition-colors">
                ← Volver a la terminal de inicio
            </a>
        </div>

    </div>

</body>
</html>