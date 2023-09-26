@props([
    'url' => null,
    'title'
])

<a href="{{ $url }}">
    <span class="inline-flex items-center px-2 py-1 text-xs text-gray-600 bg-gray-200 border-gray-500 rounded-full">{{ $title }}</span>
</a>
