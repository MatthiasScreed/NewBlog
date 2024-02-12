@props(['comment'])
<article {{ $attributes->class(['flex p-6 border border-gray-200 rounded-xl space-x-4']) }}>
    <div class="flex-shrink-0">
        <img src="{{ Auth::user()->gravatar() }}"
             alt=""
             width="60"
             height="60"
             class="rounded-xl">
    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">Posted
                <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>

        </header>
        <p>
            {!! $comment->body !!}
        </p>
    </div>
</article>
