<table class="text-left divide-y divide-gray-300 overflow-hidden">
    <colgroup>
        <col class="w-full sm:w-2/12">
        <col class="lg:w-4/12">
        <col class="lg:w-2/12">
        <col class="lg:w-2/12">
        <col class="lg:w-3/12">
    </colgroup>
    <thead class="border-b border-white/10 text-sm leading-6 text-gray-900">
    <tr>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Category</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Image</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Author</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Statut</th>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nombre de vue</th>
        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">Actions</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
    @foreach($posts as $post)
        <tr>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                <div class="truncate text-sm font-medium leading-6">{{ $post->title }}</div>
            </td>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                <div class="truncate text-sm font-medium leading-6">{{ $post->category->name }}</div>
            </td>
            <td  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div>
                    <img src="{{ asset('storage/images/'. $post->thumbnail) }}"
                         alt="{{ $post->thumbnail }}"
                         class="object-none h-20 w-20 border bg-white p-1">
                </div>
            </td>
            <td  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div>
                    {{ $post->author->name }}
                </div>
            </td>
            <td  class="whitespace-nowrap px-3 py-4 text-sm">
                <div>
                    <abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr> |
                    {!! $post->publicationLabel() !!}
                </div>
            </td>
            <td  class="whitespace-nowrap px-3 py-4 text-sm">
                <div>
                    {{ $post->likes->count() }}
                </div>
            </td>
            <td  class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                <div class="flex space-x-4">
                    @if( check_user_permissions(request(), "post@edit", $post->id))
                        <a href="{{ route('admin.posts.edit', $post->id) }}">
                            <i class="fa-solid fa-pen-to-square fax text-green-600"></i>
                        </a>
                    @else
                        <a href="#" class="" style="pointer-envents:none">
                            <i class="fa-solid fa-pen-to-square text-gray-600"></i>
                        </a>
                    @endif

                    <form action="{{ route('admin.posts.destroy', $post->id) }}"
                          method="post">

                        @csrf
                        @method('DELETE')
                        @if(check_user_permissions(request(), "post@destroy", $post->id))
                            <button type="submit">
                                <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                        @else
                            <button type="button" onclick="return false;">
                                <i class="fa-solid fa-trash text-gray-500"></i>
                            </button>
                        @endif
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
