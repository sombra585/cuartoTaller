<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto px-6">

            {{-- HERO --}}
            <div class="relative overflow-hidden rounded-[2.5rem] mb-10 border border-white/10">

                <img
                    src="{{ asset('img/8.gif') }}"
                    class="w-full h-[280px] object-cover"
                >

                <div class="absolute inset-0 bg-gradient-to-t from-[#050814] via-[#050814]/40 to-transparent"></div>

                <div class="absolute bottom-0 left-0 p-10">

                    <span class="badge mb-5">
                        STORYVERSE
                    </span>

                    <h1 class="text-6xl font-black text-white tracking-tighter leading-none mb-4">
                        Crea una nueva historia
                    </h1>

                    <p class="text-gray-300 text-lg max-w-2xl leading-relaxed">
                        Construye universos, personajes y narrativas colaborativas junto a otros usuarios.
                    </p>

                </div>

            </div>

            {{-- FORMULARIO --}}
            <div class="glass-panel">

                {{-- HEADER FORM --}}
                <div class="mb-10">

                    <span class="badge mb-5">
                        NUEVA HISTORIA
                    </span>

                    <h1 class="text-5xl font-black tracking-tighter mb-3">
                        Crear Historia
                    </h1>

                    <p class="text-gray-400">
                        Inicia una nueva narrativa colaborativa.
                    </p>

                </div>

                <form method="POST"
                      action="/stories"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- TÍTULO --}}
                    <div class="mb-6">

                        <label>
                            Título
                        </label>

                        <input
                            type="text"
                            name="title"
                            placeholder="Título de la historia"
                            required
                        >

                    </div>

                    {{-- GÉNERO --}}
                    <div class="mb-6">

                        <label>
                            Género
                        </label>

                        <select name="genre" required>

                            <option value="">
                                Selecciona un género
                            </option>

                            <option>Terror</option>
                            <option>Fantasía</option>
                            <option>Romance</option>
                            <option>Ciencia Ficción</option>
                            <option>Misterio</option>
                            <option>Drama</option>
                            <option>Acción</option>

                        </select>

                    </div>

                    {{-- PORTADA --}}
                    <div class="mb-8">

                        <label>
                            Portada
                        </label>

                        <input
                            type="file"
                            name="cover"
                            accept="image/*"
                        >

                    </div>

                    {{-- CONTENIDO --}}
                    <div class="mb-8">

                        <label>
                            Contenido
                        </label>

                        <textarea
                            name="content"
                            rows="10"
                            placeholder="Escribe el inicio..."
                            required
                        ></textarea>

                    </div>

                    <button class="btn-primary">
                        Publicar Historia
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>