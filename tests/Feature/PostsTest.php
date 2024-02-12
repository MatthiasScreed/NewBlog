<?php

it('has posts page', function () {
    $response = $this->get('/');

    $response->assertSee('');

    $posts = \App\Models\Post::all();
    $categories = \App\Models\Category::all();

    if(!$posts->count()){
        $response->assertSee('No posts yet. Please check back later.');
    }else {
        foreach ($posts as $post) {
            $response->assertSee($post->title);
            $response->assertSee($post->body);
        }
    }

    foreach ($categories as $category)
    {
        $response->assertSee($category->name);
    }


    $response->assertStatus(200);
});
