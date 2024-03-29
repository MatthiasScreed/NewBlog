<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une categorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role(['superadministrator','administrator'])
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
                        @role('superadministrator')
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
                            action="{{ route('admin.category.store') }}"
                            method="POST"
                            enctype="multipart/form-data">
                        @csrf

                        <x-form.input name="name" required />
                        <x-form.input name="slug" required />

                        <x-form.button>Publish</x-form.button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                function generateSlug(name) {
                    return name.toLowerCase().replace(/\s+/g, '-');
                }

                const nameInput = document.getElementById('name');
                const slugInput = document.getElementById('slug');

                nameInput.addEventListener('input', () => {
                    const name = nameInput.value;
                    const slug = generateSlug(name);
                    slugInput.value = slug;
                });
            });
        </script>
    </x-slot>
</x-app-layout>
