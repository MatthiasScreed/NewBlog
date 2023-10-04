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
                    <form
                          action="{{ route('prefix.posts.store') }}"
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
                               class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                        <div class="sm:col-span-3">
                            <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                            <div class="mt-2">
                                <select id="category_id" name="category_id" autocomplete="country-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach($categories as $category)
                                        <option value=" {{ $category->id }}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            function generateSlug(title) {
                return title.toLowerCase().replace(/\s+/g, '-');
            }

            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');

            titleInput.addEventListener('input', () => {
                const title = titleInput.value;
                const slug = generateSlug(title);
                slugInput.value = slug;
            });
        });
        </script>
    </x-slot>
</x-app-layout>
