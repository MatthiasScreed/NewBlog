<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Manage user !") }}
                </div>
            </div>

            <div class="flex">
                <x-backend.side-navbar/>
                @role(['superadministrator', 'administrator'])
                <div class="w-4/5 mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center py-6">
                        <div class="sm:flex-auto">
                            <h2 class="mt-4">Les users en DB</h2>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('admin.user.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer un Utilisateur</a>
                        </div>
                    </div>

                    <div class="mt-3">
                        @if (!$users->count())
                            <div class="rounded-md bg-yellow-50 p-4">
                                <div class="flex">
                                    <p class="text-sm font-medium text-yellow-800">No record found</p>
                                </div>
                            </div>
                        @else
                            @include('users.table')
                        @endif
                    </div>
                </div>

                @endrole
            </div>
        </div>
    </div>


</x-app-layout>
