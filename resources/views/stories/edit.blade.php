<x-app-layout>

    <div class="py-12">

        <div class="max-w-4xl mx-auto px-6">

            <div class="glass-panel">

                <div class="mb-10">

                    <h1 class="text-4xl font-black text-white">
                        Editar Historia
                    </h1>

                    <p class="text-gray-400 mt-2">
                        Modifica tu historia.
                    </p>

                </div>

                <form method="POST"
                      action="/stories/{{ $story->id }}"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- TITULO --}}
                    <div class="mb-6">

                        <label>
                            Título
                        </label>

                        <input type="text"
                               name="title"
                               value="{{ $story->title }}">

                    </div>

                    {{-- GENERO --}}
                    <div class="mb-6">

                        <label>
                            Género
                        </label>

                        <select name="genre">

                            <option {{ $story->genre == 'Terror' ? 'selected' : '' }}>
                                Terror
                            </option>

                            <option {{ $story->genre == 'Fantasía' ? 'selected' : '' }}>
                                Fantasía
                            </option>

                            <option {{ $story->genre == 'Romance' ? 'selected' : '' }}>
                                Romance
                            </option>

                            <option {{ $story->genre == 'Ciencia Ficción' ? 'selected' : '' }}>
                                Ciencia Ficción
                            </option>

                            <option {{ $story->genre == 'Misterio' ? 'selected' : '' }}>
                                Misterio
                            </option>

                            <option {{ $story->genre == 'Drama' ? 'selected' : '' }}>
                                Drama
                            </option>

                            <option {{ $story->genre == 'Acción' ? 'selected' : '' }}>
                                Acción
                            </option>

                        </select>

                    </div>

                    {{-- PORTADA --}}
                    <div class="mb-8">

                        <label>
                            Cambiar portada
                        </label>

                        @if($story->cover)

                            <img
                                src="{{ asset('storage/' . $story->cover) }}"
                                class="w-full h-72 object-cover rounded-3xl mb-5"
                            >

                        @endif

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