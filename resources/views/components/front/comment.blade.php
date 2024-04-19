@props(['comment'])
<article {{ $attributes->class(['flex p-6 border border-gray-200 rounded-xl justify-between']) }}>
    <div class="flex space-x-4">
        <div class="flex-shrink-0">
                <img src="{{ $comment->author->gravatar() }}"
                     alt=""
                     width="60"
                     height="60"
                     class="rounded-xl">
        </div>

        <div x-data="{ editing: false }" x-cloak>
            <header class="mb-4 flex justify-between items-center w-full">
                <div>
                    <h3 class="font-bold">{{ $comment->author->name }}</h3>
                    <p class="text-xs">Posted
                        <time>{{ $comment->created_at->diffForHumans() }}</time>
                    </p>
                </div>

                @if(Auth::id() === $comment->author->id)
                    <div class="ml-auto text-sm flex space-x-2">
                        <button @click="editing = !editing">
                            <span x-show="!editing">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span x-show="editing">
                                <i class="fa-solid fa-times"></i>
                            </span>
                        </button>

                        <form action="{{ route('post-comments.delete', $comment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="fa-solid fa-square-minus text-red-300 hover:text-red-600 fa-lg"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </header>

            @if(Auth::id() === $comment->author->id)
                <div x-show="!editing">
                    <p>
                        {!! $comment->body !!}
                    </p>
                </div>

                <form x-show="editing" x-data="{ body : '{{ $comment->body }}'}" @submit.prevent="submitEditForm">
                    <textarea x-model="body" name="body"></textarea>
                    <button x-on:click="editing = false" type="submit">Submit</button>
                </form>
            @else
                <div>
                    <p>
                        {!! $comment->body !!}
                    </p>
                </div>
            @endif
        </div>
    </div>
</article>
