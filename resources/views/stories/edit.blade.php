<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto px-6">

            <div class="glass-panel">

                <div class="mb-10">

                    <h1 class="text-4xl font-black text-white">
                        Editar Historia
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Modifica el título o contenido de tu historia.
                    </p>

                </div>

                <form method="POST"
                      action="/stories/{{ $story->id }}">

                    @csrf
                    @method('PUT')

                    <div class="mb-6">

                        <label>
                            Título
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ $story->title }}">

                    </div>

                    <div class="mb-6">

                        <label>
                            Contenido
                        </label>

                        <textarea name="content"
                                  rows="10">{{ $story->content }}</textarea>

                    </div>

                    <div class="flex gap-4">

                        <button class="btn-primary">

                            Guardar Cambios

                        </button>

                        <a href="/my-stories"
                           class="btn-outline">

                            Cancelar

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>