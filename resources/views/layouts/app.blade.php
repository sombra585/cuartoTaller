<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Historias Continuas') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Importamos tu CSS para que las clases glass-panel funcionen --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body class="font-['Inter'] antialiased bg-[#050814] text-white">
    <div class="min-h-screen bg-[#050814]">
        
        @include('layouts.navigation')

        {{-- Header estilizado --}}
        @if (isset($header))
            <header class="bg-[#0b0f1a]/80 border-b border-white/5 backdrop-blur-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        {{-- Fondo decorativo sutil para el panel --}}
        <div class="fixed inset-0 -z-10 pointer-events-none">
            <div class="absolute w-[500px] h-[500px] bg-emerald-500/5 blur-[120px] rounded-full -top-40 -left-40"></div>
        </div>

        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>