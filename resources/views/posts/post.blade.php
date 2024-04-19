<x-front.layout>
    <div class="flex flex-col-reverse p-4 space-y-4 divide-y-2 divide-slate-200 lg:max-w-7xl lg:mx-auto">
        <aside id="aside-content">
            <div>
                <h1 class="mt-0 mb-6 text-5xl font-bold leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('monkey_logo.svg') }}" alt="" class="w-10 h-10 rounded-full">
                    <span class="ml-2">.</span>
                    <p class="text-lg text-slate-500 ml-2">{{ $post->author->name  }}</p>
                    <span class="ml-2">.</span>
                    <p class="text-lg text-slate-500 ml-2">{{ $post->created_at->diffForHumans() }}</p>

                        <div class="ml-auto flex items-center justify-center">
                            @guest
                                <button class="block">
                                    <i class="fa-solid fa-heart text-gray-500"></i>
                                </button>
                                <span class="text-xs text-gray-500 ml-4" id="like-count">{{ $post->likes()->where('liked', true)->count() }}</span>
                            @else
                                @php
                                    $isLikedByCurrentUser = optional(auth()->user())->id ? $post->isLikedBy(auth()->user()) : false;
                                @endphp
                                <button x-data="{ liked: {{ $isLikedByCurrentUser ? 'true' : 'false' }} }" x-on:click.prevent="toggleLike({{ $post->id }}, liked)">
                                    <i class="fa-solid fa-heart" x-bind:class="{ 'text-blue-500': liked, 'text-gray-500': !liked }"></i>
                                </button>
                                <span class="ml-2 text-xs text-gray-500" id="like-count">{{ $post->likes()->where('liked', true)->count() }}</span>
                            @endguest
                        </div>

                </div>
                <div>
                    {!! $post->body !!}
                </div>
            </div>
            <div>
                <a href="/?category={{ $post->category->name }}">
                    <span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">{{ $post->category->name }}</span>
                </a>
            </div>
            <section class="mt-10 space-y-6">
               @include('posts._add-comment-form')
                <livewire:comments :post="$post"/>
            </section>
        </aside>

        <main id="main-content">
            <div class="flex flex-col mb-8 space-y-8">
                <div class="relative">
                    <img src="{{ asset('storage/images/'. $post->thumbnail) }}" alt="image_name">
                </div>
            </div>
        </main>
        <a href="/">Go Back</a>
    </div>

    <x-slot name="scripts">
        <script>
            async function toggleLike(postId, liked) {
                try {
                    const response = await axios.post(`/posts/${postId}/like`, { liked });
                    // Assuming you want to update the like count or perform other actions on success
                    console.log(response.data.message);
                    // You may update the like count or other UI elements here
                    document.getElementById('like-count').innerText = response.data.likesCount;
                } catch (error) {
                    console.error('Erreur lors de la requête Ajax :', error);
                }
            }

            {{--async function FetchComments() {--}}
            {{--    try {--}}
            {{--        const response = await fetch('{{ route('post-comments.all', $post->slug ) }}');--}}

            {{--        if (!response.ok) {--}}
            {{--            throw new Error('Failed to fetch items');--}}
            {{--        }--}}

            {{--        const comments = await response.json();--}}
            {{--        console.log(comments);--}}
            {{--        comments.forEach(comment => {--}}
            {{--            const html = `<x-front.comment :comment="${JSON.stringify(comment)}"></x-front.comment>`;--}}

            {{--            document.getElementById('comments-container').insertAdjacentHTML('beforeend', html);--}}
            {{--        });--}}
            {{--    } catch (error) {--}}
            {{--        console.error('Error:', error);--}}
            {{--    }--}}
            {{--}--}}


            function submitEditForm() {
                const body = document.querySelector('[name="body"]').value;
                {{--const commentId = {{ $comment->id }};--}}

                const params = new URLSearchParams(); // Utilisation de URLSearchParams pour formater les données
                params.append('body', this.body);
                console.log(this.body);
                console.log(params);
                axios.put(`/comments/${commentId}/update`, params)
                    .then(response => {
                        console.log(response.data);

                        // Alpine.store('editing', false);
                    })
                    .catch(error => {
                        console.error('Error updating comment:', error);
                        // Afficher un message d'erreur à l'utilisateur si nécessaire
                    });
            }

            // FetchComments();
        </script>
    </x-slot>
</x-front.layout>
