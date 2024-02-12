<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
           <x-backend.side-navbar/>

            <div class="w-3/5 mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                          action="{{ route('admin.posts.store') }}"
                          method="POST"
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
                        <x-form.field>
                                <label for="published_at" class="block mb-2 uppercase font-bold text-xs text-gray-700">Publication date</label>
                                <input type="date" id="datepicker" name="published_at" class="border border-gray-200 p-2 rounded">
                        </x-form.field>
                        <x-form.field>
                            <div class="pull-left">
                                <a id="draft-btn" class="btn btn-default">Save Draft</a>
                            </div>
                            <x-form.button>Publish</x-form.button>
                        </x-form.field>
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
