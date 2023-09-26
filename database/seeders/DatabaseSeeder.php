<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = \App\Models\User::factory()->create();

         $personal = Category::create([
             'name' => 'Personal',
             'slug' => 'personal'
         ]);

        $family  = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $personal->id,
            'title' => 'My Personal post',
            'slug' => 'my-personal-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $family->id,
            'title' => 'My Family post',
            'slug' => 'my-family-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My Work post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
