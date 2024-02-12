<table class="whitespace-nowrap text-left divide-y divide-gray-300">
    <colgroup>
        <col class="w-full sm:w-2/12">
        <col class="lg:w-4/12">
        <col class="lg:w-2/12">
        <col class="lg:w-2/12">
    </colgroup>
    <thead class="border-b border-white/10 text-sm leading-6 text-gray-900">
    <tr>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Action</th>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Comment</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Post Name</th>
    </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
    @foreach( $comments as $comment)
        <tr>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                @if(auth()->user()->hasRole('superadministrator'))
                    <form method="POST" action="{{route('admin.comments.delete', $comment->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-xs btn-danger disabled">
                            <i class="fa fa-times text-red-600"></i>
                        </button>
                    </form>
                @else
                    <button onclick="return false" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                @endif
            </td>
            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                <div class="truncate text-sm font-medium leading-6">{{ $comment->author->name }}</div>

            </td>
            <td  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="truncate text-sm font-medium leading-6">{!! Str::words($comment->body,100, '(...)') !!}</div>
            </td><td  class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <div class="truncate text-sm font-medium leading-6">{{ $comment->post->title }}</div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
