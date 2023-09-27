<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('prefix.posts.store') }}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Titre :</label>
                            <div class="mt-2">
                                <input type="text"
                                       name="title"
                                       value="{{ old('title') }}"
                                       placeholder="Le titre du post"
                                       id="title"
                                       x-model="title"
                                       x-on:input="slugGenerator.generateSlug()"
                                       class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        @error('title')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div>
                            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Content :</label>
                            <div class="mt-2">
                                <textarea name="body"
                                          id="body"
                                          cols="30"
                                          rows="10"
                                          placeholder="Le contenu du post"
                                          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('content') }}</textarea>
                            </div>
                        </div>

                        @error('body')
                        <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div>
                            <label for="thumbnail">Image</label>
                            <input type="file"
                                   name="thumbnail"
                                   id="thumbnail">
                        </div>

                        @error('thumbnail')
                        <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="title">Slug :</label>
                        <input type="text"
                               name="slug"
                               value="{{ old('slug') }}"
                               id="slug"
                               x-model="slug"
                               class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                        <div class="sm:col-span-3">
                            <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                            <div class="mt-2">
                                <select id="category_id" name="category_id" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach($categories as $category)
                                        <option>United States</option>
                                        <option>Canada</option>
                                        <option>Mexico</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
        Alpine.data('slugGenerator', () => ({
        title: '',
        slug: '',

        $watch: ['title'],
        generateSlug() {
        // Utilisez ici une logique pour générer le slug à partir du titre.
        // Vous pouvez utiliser des fonctions JavaScript pour cela.

        // Par exemple, vous pouvez convertir le titre en minuscules et remplacer les espaces par des tirets.
        this.slug = this.title.toLowerCase().replace(/\s+/g, '-');
        }
        }));
        </script>
    </x-slot>
</x-app-layout>
