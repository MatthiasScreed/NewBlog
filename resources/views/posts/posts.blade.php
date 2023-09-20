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
            <div class="hidden lg:block">
                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">Design</span></a>
                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">Dev</span></a>
                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">Illustration</span></a>
                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">Web3</span></a>

                <div class="mt-12">
                    <h2 class="mb-8 text-4xl font-bold leading-tight">Popular Post</h2>

                    <!--Card-->
                    <div class="space-y-4">
                        <x-front.min-card image="/public/img/thomas-mahon-hex-tutorial.jpg" image_alt="thomas-mahon-hex-tutorial.jpg" title="Article_Title"/>

                        <div class="flex bg-white rounded-lg shadow-md hover:shadow-lg">
                            <div class="w-1/2">
                                <img src="/public/img/thomas-mahon-hex-tutorial.jpg" alt="" class="w-full object-cover rounded-l-lg">
                            </div>
                            <div class="w-1/2 px-2 p-4">
                                <h3 class="mb-2 text-2xl font-bold">Article_Title</h3>
                            </div>
                        </div>
                        <div class="flex bg-white rounded-lg shadow-md hover:shadow-lg">
                            <div class="w-1/2">
                                <img src="/public/img/thomas-mahon-hex-tutorial.jpg" alt="" class="w-full object-cover rounded-l-lg">
                            </div>
                            <div class="w-1/2 px-2 p-4">
                                <h3 class="mb-2 text-2xl font-bold">Article_Title</h3>
                            </div>
                        </div>
                        <div class="flex bg-white rounded-lg shadow-md hover:shadow-lg">
                            <div class="w-1/2">
                                <img src="/public/img/thomas-mahon-hex-tutorial.jpg" alt="" class="w-full object-cover rounded-l-lg">
                            </div>
                            <div class="w-1/2 px-2 p-4">
                                <h3 class="mb-2 text-2xl font-bold">Article_Title</h3>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </aside>
        @foreach($posts as $post)
            <article>
                <h1>
                    <a href="/posts/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h1>

                <div>
                    {{ $post->excerpt }}
                </div>
            </article>
        @endforeach
    </div>
</x-front.layout>
