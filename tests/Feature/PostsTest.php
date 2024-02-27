<?php

it('has Home page', function () {
    $response = $this->get('/');

    $response->assertSee('Matthias Screed');
//    $response->assertSee('Hello welcome I\'m web Dev, Designer, base in paris is a blog about my creation and discovery en various topic');

    $posts = \App\Models\Post::all();
    $categories = \App\Models\Category::all();

    if(!$posts->count()){
        $response->assertSee('No posts yet. Please check back later.');
    }else {
        foreach ($posts as $post) {
            $response->assertSee($post->title);

        }
    }

    foreach ($categories as $category)
    {
        $response->assertSee($category->name);
    }


    $response->assertStatus(200);
});

it('has Post page', function(){
    $posts = \App\Models\Post::factory()->count(6)->create();

    foreach ($posts as $post) {
        $response = $this->get('posts/'. $post->slug .'/');
        $response->assertSee($post->body);
    }
});


