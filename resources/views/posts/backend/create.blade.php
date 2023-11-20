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
                          action="/admin/posts"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <x-form.input name="title" required />
                        <x-form.textaera name="body" required />
                        <x-form.input name="thumbnail" type="file" required />
                        <x-form.input name="slug" required />

                        <x-form.field>
                            <x-form.label name="category"/>

                            <select name="category_id"
                                    id="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    >{{ ucwords($category->name) }}</option>
                                @endforeach
                            </select>

                                <x-form.error name="category" />
                        </x-form.field>



                        <x-form.button>Publish</x-form.button>
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
