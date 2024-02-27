<?php

use App\Models\Category;
use App\Models\User;

it('has storepost page', function () {

    $category = \App\Models\User::factory()->create();

    login()->post('/admin/posts/', [
        'category_id' => $category->id,
        'title' => 'Le Grand Test Relou',
        'slug' => \Illuminate\Support\Str::slug('Le Grand Test Relou', '-'),
        'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis vehicula metus, at pharetra ex. Sed risus felis, vulputate sed tellus at, convallis sagittis diam. Quisque eget pulvinar lacus. Aliquam turpis neque, tincidunt sit amet tincidunt quis, suscipit id ante.',
        'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis vehicula metus, at pharetra ex. Sed risus felis, vulputate sed tellus at, convallis sagittis diam. Quisque eget pulvinar lacus. Aliquam turpis neque, tincidunt sit amet tincidunt quis, suscipit id ante. Aliquam id elit accumsan, euismod elit consequat, varius tellus. Integer lacinia pulvinar risus at vehicula. Nullam elementum aliquet quam ac imperdiet. Donec egestas, nisi id hendrerit faucibus, nisi nulla ultrices dolor, id pellentesque ante enim non odio. Phasellus convallis pretium eros. Sed nisi diam, tincidunt non dui quis, porta iaculis arcu. Sed ante ante, interdum ac pellentesque eu, laoreet quis eros. Nullam pellentesque nec ex a lacinia.',
    ])->assertRedirect('admin/dashboard')->assertSessionHas('success','post Register');

});

it('return 403 error When non-admin user trie to create a post', function () {
        $user = User::factory()->create();
        $category = \App\Models\User::factory()->create();
        \Pest\Laravel\actingAs($user);

        $response = $this->post('/admin/posts/', [
            'category_id' => $category->id,
            'title' => 'Le Grand Test Relou',
            'slug' => \Illuminate\Support\Str::slug('Le Grand Test Relou', '-'),
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis vehicula metus, at pharetra ex. Sed risus felis, vulputate sed tellus at, convallis sagittis diam. Quisque eget pulvinar lacus. Aliquam turpis neque, tincidunt sit amet tincidunt quis, suscipit id ante.',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis vehicula metus, at pharetra ex. Sed risus felis, vulputate sed tellus at, convallis sagittis diam. Quisque eget pulvinar lacus. Aliquam turpis neque, tincidunt sit amet tincidunt quis, suscipit id ante. Aliquam id elit accumsan, euismod elit consequat, varius tellus. Integer lacinia pulvinar risus at vehicula. Nullam elementum aliquet quam ac imperdiet. Donec egestas, nisi id hendrerit faucibus, nisi nulla ultrices dolor, id pellentesque ante enim non odio. Phasellus convallis pretium eros. Sed nisi diam, tincidunt non dui quis, porta iaculis arcu. Sed ante ante, interdum ac pellentesque eu, laoreet quis eros. Nullam pellentesque nec ex a lacinia.',
        ]);

        $response->assertStatus(403);
});
