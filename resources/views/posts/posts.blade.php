<x-front.layout>
    <div class="flex flex-col p-4 space-y-4 divide-y-2 lg:space-y-0 divide-slate-200 lg:divide-x-2 lg:divide-y-0 lg:flex-row lg:p-0 lg:max-w-7xl lg:mx-auto">
        <aside class="sm:p-8 md:space-y-4 lg:w-2/5">
            <!-- introduction -->
            <div>
                <h1 class="mt-0 mb-2 text-5xl font-bold leading-tight">Matthias Screed</h1>
                <div class="mb-6 text-xl">Dev Designer</div>
                <p class="text-lg max-w-prose">
                    Hello welcome I'm web Dev, Designer,
                    base in paris is a blog about my creation and discovery
                    en various topic
                </p>
            </div>

            <!-- categeorie -->
            <div class="hidden md:block">
                @foreach($categories as $category)
                    <x-front.pastille-category title="{{ $category->name }}"/>
                @endforeach


                <div class="mt-12">
                    <h2 class="mb-8 text-4xl font-bold leading-tight">Popular Post</h2>

                    <!--Card-->
                    <div class="space-y-4">
                        <x-front.min-card image="img/thomas-mahon-hex-tutorial.jpg" image_alt="thomas-mahon-hex-tutorial.jpg" title="Article_Title"/>
                        <x-front.min-card image="img/thomas-mahon-hex-tutorial.jpg" image_alt="thomas-mahon-hex-tutorial.jpg" title="Article_Title"/>
                        <x-front.min-card image="img/thomas-mahon-hex-tutorial.jpg" image_alt="thomas-mahon-hex-tutorial.jpg" title="Article_Title"/>
                        <x-front.min-card image="img/thomas-mahon-hex-tutorial.jpg" image_alt="thomas-mahon-hex-tutorial.jpg" title="Article_Title"/>
                    </div>

                </div>
            </div>
        </aside>
        <main class="pt-4 sm:px-8 lg:pt-8 lg:w-3/5">
            <div class="flex flex-col items-center justify-between mb-8 space-y-4 md:space-y-0 md:flex-row">
                <h2 class="text-4xl font-bold leading-tight">Lastest Post</h2>
                <form action="#" method="get">
                    <input type="text" name="search" value="{{ request('search') }}" class="p-3 mr-1 rounded-lg focus:ring-0 focus:border-blue-500" placeholder="Search">
                    <button class="px-4 py-3 text-white rounded-lg bg-slate-600">submit</button>
                </form>
            </div>
            <div class="flex flex-col mb-8 space-y-8">
                @foreach($posts as $post)
                    <x-front.card-home url="/posts/{{ $post->id }}"
                                       category-name="{{ $post->category->name }}"
                                       image="/img/thomas-mahon-hex-tutorial.jpg"
                                       post-title="{{ $post->title }}"
                                       avatar="/img/thomas-mahon-hex-queenfetoos.jpg"
                                       author-name="{{ $post->author->name }}"
                                       post-date="{{ $post->created_at->diffForHumans() }}"/>
                @endforeach
            </div>
        </main>
    </div>
</x-front.layout>
