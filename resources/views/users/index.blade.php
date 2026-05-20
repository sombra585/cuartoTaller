<x-app-layout>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">

            {{-- HEADER --}}
            <div class="flex items-end justify-between mb-10">

                <div>

                    <span class="badge mb-4">
                        ADMINISTRACIÓN
                    </span>

                    <h1 class="text-5xl font-black tracking-tighter text-white">
                        Usuarios Registrados
                    </h1>

                    <p class="text-gray-500 mt-3 text-sm">
                        Gestiona los usuarios del sistema.
                    </p>

                </div>

            </div>

            {{-- BUSCADOR --}}
            <div class="glass-panel mb-8">

                <form method="GET" action="/users">

                    <div class="flex gap-4">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Buscar usuario..."
                            class="flex-1 bg-[#0d121f] border border-white/10 rounded-2xl px-5 py-4 text-white focus:outline-none focus:border-emerald-500/40"
                        >

                        <button class="btn-primary">

                            Buscar

                        </button>

                    </div>

                </form>

            </div>

            @if($users->count())

                <div class="glass-panel overflow-hidden">

                    <div class="overflow-x-auto">

                        <table class="w-full">

                            <thead class="border-b border-white/10 bg-white/5">

                                <tr>

                                    <th class="px-6 py-5 text-left text-xs uppercase tracking-[0.2em] text-gray-400">

                                        <a href="?sort=id&direction={{ $direction == 'asc' ? 'desc' : 'asc' }}">

                                            ID

                                        </a>

                                    </th>

                                    <th class="px-6 py-5 text-left text-xs uppercase tracking-[0.2em] text-gray-400">

                                        <a href="?sort=name&direction={{ $direction == 'asc' ? 'desc' : 'asc' }}">

                                            Nombre

                                        </a>

                                    </th>

                                    <th class="px-6 py-5 text-left text-xs uppercase tracking-[0.2em] text-gray-400">

                                        <a href="?sort=email&direction={{ $direction == 'asc' ? 'desc' : 'asc' }}">

                                            Email

                                        </a>

                                    </th>

                                    <th class="px-6 py-5 text-left text-xs uppercase tracking-[0.2em] text-gray-400">

                                        <a href="?sort=created_at&direction={{ $direction == 'asc' ? 'desc' : 'asc' }}">

                                            Registro

                                        </a>

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($users as $user)

                                    <tr class="border-b border-white/5 hover:bg-white/5 transition">

                                        <td class="px-6 py-5 text-gray-400 font-bold">
                                            #{{ $user->id }}
                                        </td>

                                        <td class="px-6 py-5">

                                            <p class="text-white font-bold">
                                                {{ $user->name }}
                                            </p>

                                        </td>

                                        <td class="px-6 py-5 text-gray-400">
                                            {{ $user->email }}
                                        </td>

                                        <td class="px-6 py-5 text-emerald-400 text-sm font-bold">
                                            {{ $user->created_at->diffForHumans() }}
                                        </td>

                                        <td class="px-6 py-5">

                                            <div class="flex items-center justify-center gap-3">

                                                {{-- EDITAR --}}
                                                <a href="/users/{{ $user->id }}/edit"
                                                   class="px-4 py-2 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 hover:bg-blue-500/20 transition text-sm font-bold">

                                                    Editar

                                                </a>

                                                {{-- ELIMINAR --}}
                                                <form method="POST"
                                                      action="/users/{{ $user->id }}">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="px-4 py-2 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 hover:bg-red-500/20 transition text-sm font-bold">

                                                        Eliminar

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                {{-- PAGINACIÓN --}}
                <div class="mt-8">

                    {{ $users->links() }}

                </div>

            @else

                <div class="glass-panel text-center py-24">

                    <h2 class="text-5xl font-black text-white mb-4 tracking-tight">

                        No hay usuarios registrados

                    </h2>

                    <p class="text-gray-500 text-lg max-w-xl mx-auto leading-relaxed">

                        Aún no existen usuarios dentro del sistema.

                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>