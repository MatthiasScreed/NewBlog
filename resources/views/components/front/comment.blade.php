@props(['comment'])
<article {{ $attributes->class(['flex p-6 border border-gray-200 rounded-xl justify-between']) }}>
    <div class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="{{ Auth::user()->gravatar() }}"
                 alt=""
                 width="60"
                 height="60"
                 class="rounded-xl">
        </div>

        <div>
            <header class="mb-4 flex justify-between items-center w-full">
                <div>
                    <h3 class="font-bold">{{ $comment->author->name }}</h3>
                    <p class="text-xs">Posted
                        <time>{{ $comment->created_at->diffForHumans() }}</time>
                    </p>
                </div>


            </header>
            <p>
                {!! $comment->body !!}
            </p>
        </div>
    </div>
    @if(Auth::id() === $comment->author->id)
        <div class="ml-auto text-sm">
            <form action="{{ route('post-comments.delete', $comment) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">
                    <i class="fa-solid fa-square-minus text-red-300 hover:text-red-600 fa-lg"></i>
                </button>
            </form>
        </div>
    @endif
</article>
