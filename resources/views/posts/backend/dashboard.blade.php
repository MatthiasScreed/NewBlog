@php
    use App\Models\Post;
    use App\Http\Requests;
    $posts = Post::orderBy('created_at', 'desc')->get();
@endphp
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
                        {{ __("You're logged in!") }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <x-backend.side-navbar/>
                    @role(['superadministrator','admin'])
                        <div class="w-4/5 mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center py-6">
                                <div class="sm:flex-auto">
                                    <h2 class="text-base font-semibold leading-6 text-gray-900 px-3">Posts</h2>
                                    <div class="sm:hidden">
                                        <label for="status_post"></label>
                                    </div>
                                    <div class="hidden sm:block">
                                        <ul class="flex">
                                            <?php $links = [] ?>
                                            @foreach($statusList as $key => $value)
                                                @if($value)
                                                        <?php $selected = Request::get('status') == $key ? 'bg-gray-100 text-gray-700 rounded-md px-3 py-2 text-sm font-medium' : 'text-gray-500 hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium' ?>
                                                        <?php $links[] = "<li><a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($key) . "({$value})</a></li>" ?>
                                                @endif
                                            @endforeach
                                            {!! implode(' | ', $links) !!}
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                    <a href="{{ route('admin.posts.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer un post</a>
                                </div>
                                <div class="hidden">
                                    <div class="inline-flex items-center rounded-md bg-yellow-200 px-2 py-1 text-xs font-medium text-yellow-800"></div>
                                    <div class="inline-flex items-center rounded-md bg-blue-200 px-2 py-1 text-xs font-medium text-blue-700"></div>
                                    <div class="inline-flex items-center rounded-md bg-green-200 px-2 py-1 text-xs font-medium text-green-700"></div>
                                </div>
                            </div>
                            <div class="mt-3">
                                @if (!$posts->count())
                                    <div class="rounded-md bg-yellow-50 p-4">
                                        <div class="flex">
                                            <p class="text-sm font-medium text-yellow-800">No record found</p>
                                        </div>
                                    </div>
                                @else
                                    @if($onlyTrashed)
                                        @include('posts.backend.table-trash')
                                    @else
                                        @include('posts.backend.table')
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
</x-app-layout>
