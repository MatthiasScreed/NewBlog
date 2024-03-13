<x-front.layout>
        <div class="flex flex-col p-4 space-y-4 divide-y-2 lg:space-y-0 divide-slate-200 lg:divide-x-2 lg:divide-y-0 lg:flex-row lg:p-0 lg:max-w-7xl lg:mx-auto">
{{--            aside--}}
            <aside id="presentation" class="sm:p-8 md:space-y-4 lg:w-2/5">
            <!-- introduction -->
                <div>
                    <h1 class="mt-0 mb-2 text-5xl font-extrabold leading-tight">Matthias Screed</h1>
                    <div id='output' class="flex mb-6 text-xl font-semibold"></div>
                    <p class="text-lg max-w-prose">
                        I am a <span class="font-bold">web developer and graphic designer</span> located in the Paris area. This is my creative blog where I publish my various creations and discoveries on various topics.
                    </p>
                </div>
            <!-- categeorie -->
                <div class="hidden md:block">
                    <div class="space-y-2">
                        @foreach($categories as $category)
                            <x-front.pastille-category url="/?category={{ $category->slug }}"  title="{{ $category->name }}"/>
                        @endforeach
                    </div>

                    @if($popularPosts->count())
                        <div class="mt-12">
                            <h2 class="mb-8 text-4xl font-bold leading-tight">Popular Post</h2>
                            <!--Card-->
                            <div class="space-y-4">

                                    @foreach($popularPosts as $popPost)
                                        <x-front.min-card url="{{ route('post.show', $popPost->slug) }}" image="{{ $popPost->thumbnail }}" image_alt="{{  $popPost->title }}" title="{{  $popPost->title }}"/>
                                    @endforeach
                                        @else
                                    <p class="text-center mt-4">No posts yet. Please check back later.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </aside>
{{--        end Aside--}}
{{--            section--}}
            <main class="pt-4 sm:px-8 lg:pt-8 lg:w-3/5">
                <div class="flex flex-col items-center justify-between mb-8 space-y-4 md:space-y-0 md:flex-row">
                    <h2 class="text-4xl font-bold leading-tight">Lastest Post</h2>
                    <form action="/?{{ request()->getQueryString() }}" method="GET">
                        <input type="text" name="search" value="{{ request('search') }}" class="p-3 mr-1 rounded-lg focus:ring-0 focus:border-blue-500" placeholder="Search">
                        <button class="px-4 py-3 text-white rounded-lg bg-slate-600">submit</button>
                    </form>
                </div>
                <div class="flex flex-col mb-8 space-y-8">
                    @if($posts->count())
                        <x-front.posts-grid :posts="$posts"/>

                        {{ $posts->links() }}
                    @else
                        <p class="text-center">No posts yet. Please check back later.</p>
                    @endif
                </div>
            </main>
{{--            endSection--}}
        </div>
</x-front.layout>
