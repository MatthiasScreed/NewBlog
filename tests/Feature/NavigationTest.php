<?php

use App\Models\Post;

it('has navigation page', function () {
    // Test de la page d'acceuil
    $this->get('/')->assertStatus(200);

    // Test de la page "À propos"
    $this->get('/about')->assertStatus(200);

    $post = Post::factory()->create();
    $this->get(route('post.show', $post))->assertStatus(200);

    $this->get('/login')->assertStatus(200);

    login()->get('/admin/posts/create')->assertStatus(200);

});
