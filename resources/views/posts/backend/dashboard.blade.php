@php
    use App\Models\Post;

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

                <div class="flex">
                @role(['admin', 'editor'])
                <div class="w-1/5 bg-white mr-4 shadow-sm sm:rounded-lg sm:px-6 lg:px-8 mt-6">
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
                    @role(['admin', 'editor'])
                <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg sm:px-6 lg:px-8">
                    <h2 class="mt-4">Les posts en DB</h2>
                    <table class="w-full whitespace-nowrap text-left">
                        <colgroup>
                            <col class="w-full sm:w-2/12">
                            <col class="lg:w-4/12">
                            <col class="lg:w-2/12">
                            <col class="lg:w-2/12">
                            <col class="lg:w-3/12">
                        </colgroup>
                        <thead class="border-b border-white/10 text-sm leading-6 text-gray-900">
                        <tr>
                            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Title</th>
                            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Image</th>
                            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Author</th>
                            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Statut</th>
                            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                        @foreach($posts as $post)
                            <tr>
                                <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                                    <div class="truncate text-sm font-medium leading-6">{{ $post->title }}</div>
                                </td>
                                <td  class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                                    <div>
                                        <img src="{{ asset('storage/images/'. $post->thumbnail) }}"
                                             alt="{{ $post->thumbnail }}"
                                             class="h-20 w-20 border bg-white p-1">
                                    </div>
                                </td>
                                <td  class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                                    <div>
                                        {{ $post->author->name }}
                                    </div>
                                </td>
                                <td  class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                                    <div>
                                        <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                                        {!! $post->publicationLabel() !!}
                                    </div>
                                </td>
                                <td  class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
                                    <div class="flex justify-between">
                                        @if(check_user_permissions(request(), "post@edit", $post->id))
                                            <a href="{{ route('admin.posts.edit', $post) }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        @else
                                            <a href="#" class="" style="pointer-envents:none">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        @endif

                                            <form action="{{ route('admin.posts.destroy', $post) }}"
                                                  method="post">

                                                @csrf
                                                @method('DELETE')
                                                @if(check_user_permissions(request(), "post@destroy", $post->id))
                                                    <button type="submit">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @else
                                                    <button type="button" onclick="return false;">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                @endif
                                            </form>



                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    @endrole
            </div>
        </div>
    </div>


</x-app-layout>
