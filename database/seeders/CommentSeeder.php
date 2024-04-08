<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $posts = Post::all();

        $faker = Factory::create();

        foreach ($posts as $post) {
            $numComments = rand(4, 5);

            $suffledUsers = $users->shuffle();

            $selectedUsers = $suffledUsers->take($numComments);

            foreach ($selectedUsers as $user) {
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                    'body' => $faker->sentence(rand(1,3))
                ]);
            }
        }

    }
}
