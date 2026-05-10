<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto px-6">

            <div class="glass-panel">

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

                <form method="POST" action="/stories">

                    @csrf

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

                    <div class="mb-8">

                        <label>
                            Contenido
                        </label>

                        <textarea
                            name="content"
                            rows="8"
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