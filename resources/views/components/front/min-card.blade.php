@props([
    'image',
    'image_alt',
    'title',
    'url'
])

<a href="{{ $url }}" class=" flex bg-white rounded-lg shadow-md hover:shadow-lg">
    <div class="w-1/2">
        <img src="{{ $image }}" alt="{{$image_alt}}" class="w-full object-cover rounded-l-lg">
    </div>
    <div class="w-1/2 p-4">
        <h3 class="mb-2 text-2xl font-bold">{{ $title }}</h3>
    </div>
</a>
