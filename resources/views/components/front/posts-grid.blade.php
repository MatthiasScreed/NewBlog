@props([
    'posts'
])

@foreach($posts as $post)
    <x-front.card-home url="/posts/{{ $post->slug }}"
                       category-name="{{ $post->category->name }}"
                       image="{{ asset('storage/images/'. $post->thumbnail) }}"
                       post-title="{{ $post->title }}"
                       avatar="/img/thomas-mahon-hex-queenfetoos.jpg"
                       author-name="{{ $post->author->name }}"
                       post-date="{{ $post->created_at->diffForHumans() }}"
                       nbre_de_vue="{{ $post->view_count }}"
                       likes="{{ $post->likes->count() }}"/>
@endforeach
