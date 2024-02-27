<?php

use App\Models\Post;
use App\Models\User;

it('has commentstore', function () {
    // Créer un utilisateur
    $user = User::factory()->create();

    // Créer un article
    $post = Post::factory()->create();

    // Se connecter en tant qu' utilisateur
    login($user);



    $response = $this->post(route('post-comments.store', $post), [
        'body' => 'Ceci Commentaire'
    ]);

    $response->assertStatus(302);
});
