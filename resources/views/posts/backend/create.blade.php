<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role(['admin', 'editor'])
            <div class="w-2/5 bg-white mr-4 shadow-sm sm:rounded-lg sm:px-6 lg:px-8 ">
                <nav class="flex flex-1 mt-4">
                    <ul class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <a href="{{ route('admin.dashboard') }}"
                               class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <i class="fa-solid fa-house"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.posts.create') }}"
                               class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <i class="fa-solid fa-newspaper"></i>
                                <span>Créer un article</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.category.index') }}"
                               class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <i class="fa-solid fa-folder-tree"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        @role('admin')
                        <li>
                            <a href="{{route('admin.user.index')}}"
                               class="flex items-center gap-x-3 p-2 text-sm leading-6 font-semibold">
                                <i class="fa-solid fa-users"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        @endrole
                    </ul>
                </nav>
            </div>
            @endrole

            <div class="w-3/5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
