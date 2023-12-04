@props([
    'url' => null ,
    'image' => null,
    'image_alt' => null,
    'categoryName',
    'postDate',
    'postTitle',
    'avatar' => null,
    'avatarAlt' => null,
    'authorName',
    'nbre_de_vue',
    'likes'
])

<div>
    <a href="{{ $url }}" >
        <article class="bg-white rounded-lg shadow-md hover:shadow-lg">
            <div class="relative">
                <img src="{{ $image }}" alt="{{ $image_alt }}" class="rounded-t-lg w-full">
                <span class="absolute px-3 py-2 bg-white bg-opacity-75 rounded-lg top-8 left-6">{{ $categoryName }}</span>
            </div>
            <div class="lg:p-8">
                <h3 class="mt-6 mb-2 text-3xl font-bold">{{ $postTitle }}</h3>
                <div class="flex items-center space-x-4">
                    <img src="{{ $avatar }}" alt="{{ $avatarAlt }}" class="w-10 h-10 rounded-full">
                    <div class="flex justify-between w-full">
                        <div class="flex">
                            <span>.</span>
                            <p class="text-lg text-slate-500">{{ $authorName }}</p>
                            <span>.</span>
                            <p class="text-lg text-slate-500">{{ $postDate }}</p>
                        </div>
                        <div class="ml-auto text-slate-500">
                            <i class="fa-solid fa-eye"></i>
                            <span>{{$nbre_de_vue}}</span>
                            <i class="fa-regular fa-heart"></i>
                            <span>{{$likes}}</span>
                        </div>
                    </div>
                </div>

        </article>
    </a>
</div>
