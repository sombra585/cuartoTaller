<nav class="fixed top-6 left-1/2 -translate-x-1/2 w-[92%] max-w-7xl z-50">
    <div class="bg-[#0b0f1a]/95 backdrop-blur-md border border-white/10 rounded-2xl px-8 py-3 shadow-2xl">
        <div class="flex justify-between items-center h-12">
            
            <a href="#inicio" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center shadow-[0_0_15px_rgba(16,185,129,0.3)]">
                    <span class="text-[#050814] font-black text-xl">H</span>
                </div>
                <span class="text-white font-black tracking-tighter text-lg uppercase">Historias</span>
            </a>

            <div class="hidden lg:flex items-center gap-8">
                <a href="#inicio" class="text-[11px] font-bold text-gray-400 hover:text-white uppercase tracking-[0.2em] transition-colors">Inicio</a>
                <a href="#funcionamiento" class="text-[11px] font-bold text-gray-400 hover:text-white uppercase tracking-[0.2em] transition-colors">Funcionamiento</a>
                <a href="#historias" class="text-[11px] font-bold text-gray-400 hover:text-white uppercase tracking-[0.2em] transition-colors">Historias</a>
            </div>

            <div class="flex items-center gap-6">
                <a href="{{ route('login') }}" class="hidden sm:block text-[11px] font-bold text-gray-400 hover:text-white uppercase tracking-widest">Login</a>
                <a href="{{ route('register') }}" class="px-6 py-2.5 bg-emerald-500 text-[#050814] rounded-xl font-black text-[11px] uppercase tracking-widest hover:bg-emerald-400 transition-all shadow-lg shadow-emerald-500/20">Registrar</a>
            </div>

        </div>
    </div>
</nav>