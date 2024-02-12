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
                    {{ __("Manage Comments !") }}
                </div>
            </div>

            <div class="flex">
                <x-backend.side-navbar/>
                @role(['superadministrator', 'administrator'])
                <div class="w-4/5 mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center py-6">
                        <div class="sm:flex-auto">
                            <h2 class="mt-4">Les commentaire en DB</h2>
                        </div>
                    </div>

                    <div class="mt-3">
                        @if (!$comments->count())
                            <div class="rounded-md bg-yellow-50 p-4">
                                <div class="flex">
                                    <p class="text-sm font-medium text-yellow-800">No record found</p>
                                </div>
                            </div>
                        @else
                            @include('comments.table')
                        @endif
                    </div>
                </div>

                @endrole
            </div>
        </div>
    </div>


</x-app-layout>
