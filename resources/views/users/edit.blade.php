<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto px-6">

            <div class="glass-panel">

                <div class="mb-10">

                    <span class="badge mb-5">
                        EDITAR USUARIO
                    </span>

                    <h1 class="text-5xl font-black tracking-tighter mb-3">
                        Editar Usuario
                    </h1>

                    <p class="text-gray-400">
                        Modifica los datos del usuario.
                    </p>

                </div>

                <form method="POST"
                      action="/users/{{ $user->id }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-6">

                        <label>
                            Nombre
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ $user->name }}"
                            required
                        >

                    </div>

                    <div class="mb-8">

                        <label>
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ $user->email }}"
                            required
                        >

                    </div>

                    <div class="flex gap-4">

                        <button class="btn-primary">
                            Guardar Cambios
                        </button>

                        <a href="/users"
                           class="btn-outline">
                            Cancelar
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>