<x-front.layout>
    <div class="flex flex-col-reverse items-center p-4 space-y-4 divide-y-2 divide-slate-200 lg:max-w-7xl lg:mx-auto">
        <aside>
            <div>
                <h1 class="mt-0 mb-6 text-5xl font-bold leading-tight">{{ $post->title }}</h1>
                <div class="flex items-center mb-2 space-x-4">
                    <img src="/img/thomas-mahon-hex-queenfetoos.jpg" alt="" class="w-10 h-10 rounded-full">
                    <span>.</span>
                    <p class="text-lg text-slate-500">{{ $post->author->name  }}</p>
                    <span>.</span>
                    <p class="text-lg text-slate-500">{{ $post->created_at->diffForHumans() }}</p>
                </div>
                <p>
                    Article text Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, dignissimos! Perspiciatis dolores minima cum molestiae id labore ipsum atque, eum suscipit provident, eius laudantium esse rem aliquid minus impedit exercitationem.
                </p>
            </div>
            <div>
                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">{{ $post->category->name }}</span></a>
{{--                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">Dev</span></a>--}}
{{--                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">Illustration</span></a>--}}
{{--                <a href=""><span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">Web3</span></a>--}}
            </div>
        </aside>
        <main>
            <div class="flex flex-col mb-8 space-y-8">
                <div class="relative">
                    <img src="{{ asset('storage/images/'. $post->thumbnail) }}" alt="image_name" class="object-fill">
                </div>
            </div>
        </main>
        <a href="/">Go Back</a>
    </div>
</x-front.layout>
