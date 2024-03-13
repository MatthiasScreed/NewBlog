<x-front.layout>
        <main class="flex flex-col p-4 space-y-4 divide-y-2 lg:space-y-0 divide-slate-200 lg:divide-x-2 lg:divide-y-0 lg:flex-row lg:p-0 lg:max-w-7xl lg:mx-auto">

{{--            aside--}}
            <aside id="aside" class="sm:p-8 md:space-y-4 lg:w-2/5">
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
                                    <p class="text-center">No posts yet. Please check back later.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </aside>

{{-- end Aside--}}

{{--            section--}}
            <section id="main" class="pt-4 sm:px-8 lg:pt-8 lg:w-3/5">
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
            </section>
{{--            endSection--}}
        </main>

    <x-slot:scripts>
        <script>
            ///////////////////////////
            //change the text here //////
            let finaltexts = [["Web_developer"], ["Graphic_designer"]];
            let finaltextIndex = 0;
            let currentWordIndex = 0;
            let finaltext = finaltexts[finaltextIndex][currentWordIndex];
            let currentWordDisplayTime = 0;
            const MINIMUM_DISPLAY_TIME = 15000; // 15 seconds
            const ANIMATION_INTERVAL = 10000; // 10 seconds

            //////////////////////////


            // declare all characters
            const characters =
                "!#$%&'()*+,-./:;<=>?@[]^_`{|}~ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";


            iterations = finaltext.length + 20;

            function randomstr() {
                let n = Math.random();
                n = n * characters.length;
                n = Math.floor(n);
                let out = characters[n];
                return out;
            }

            let text = [];
            for (let i = 0; i < finaltext.length; i++) {
                let t = [];
                text.push(t);
            }

            for (let i = 0; i < finaltext.length; i++) {
                let t = text[i];
                for (let j = 0; j < iterations - 20 * Math.random(); j++) {
                    t.push(randomstr());
                }
                t.push(finaltext[i]);
            }
            //////////////////////////////////////////////////////////////////////////////
            // here we have ready arrays of random characters ending in expected letter///
            //////////////////////////////////////////////////////////////////////////////
            let counter = 0;
            let wordChangeCounter = 0;
            let wordDisplayed = false;


            function change() {
                finaltext = finaltexts[finaltextIndex][currentWordIndex];
                text = [];
                for (let i = 0; i < finaltext.length; i++) {
                    let t = [];
                    text.push(t);
                }
                for (let i = 0; i < finaltext.length; i++) {
                    let t = text[i];
                    for (let j = 0; j < iterations - 20 * Math.random(); j++) {
                        t.push(randomstr());
                    }
                    t.push(finaltext[i]);
                }

                const elemout = document.getElementById("output");
                elemout.innerHTML = ''; // Clear the previous content

                let outputlist = []; // Create an empty list to store output elements

                for (let i = 0; i < finaltext.length; i++) {
                    const outputpart = document.createElement("div");
                    outputpart.classList.add("letters");
                    elemout.appendChild(outputpart);
                    outputlist.push(outputpart); // Add each output element to the list
                }

                for (let i = 0; i < finaltext.length; i++) {
                    let ft = text[i];
                    if (counter < ft.length) {
                        if (ft[counter] === '&') {
                            outputlist[i].innerHTML = '&amp;';
                        } else if (ft[counter] === ' ') {
                            outputlist[i].innerHTML = ' ';
                        } else {
                            outputlist[i].innerHTML = ft[counter];
                        }
                    } else {
                        outputlist[i].innerHTML = ft[ft.length - 1];
                    }
                }
                counter++;
                currentWordDisplayTime++;

                if (!wordDisplayed && currentWordDisplayTime * 100 >= MINIMUM_DISPLAY_TIME) {
                    wordDisplayed = true;
                }

                if (wordDisplayed && currentWordDisplayTime * 100 >= ANIMATION_INTERVAL) {
                    currentWordDisplayTime = 0;
                    counter = 0;
                    wordDisplayed = false;
                    currentWordIndex = (currentWordIndex + 1) % finaltexts[finaltextIndex].length;
                    if (currentWordIndex === 0) {
                        finaltextIndex = (finaltextIndex + 1) % finaltexts.length;
                    }
                }
            }

            const inst = setInterval(change, 100);
        </script>

    </x-slot:scripts>
</x-front.layout>
