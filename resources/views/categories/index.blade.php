<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une categorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex justify-between max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role(['superadministrator','admin'])
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

            <div class="w-4/5 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center py-6">
                    <div class="sm:flex-auto">
                        <h2 class="mt-4">Les categories en DB</h2>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('admin.category.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer une Categorie</a>
                    </div>
                </div>

                <div class="mt-3">
                    @if (!$categories->count())
                        <div class="rounded-md bg-yellow-50 p-4">
                            <div class="flex">
                                <p class="text-sm font-medium text-yellow-800">No record found</p>
                            </div>
                        </div>
                    @else
                        @include('categories.table')
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
