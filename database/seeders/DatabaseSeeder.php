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
            'view_count' => rand(1, 10) * 10
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $family->id,
            'title' => 'My Family post',
            'slug' => 'my-family-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => 8
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My Work post',
            'slug' => 'my-work-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => rand(1, 10) * 10
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My Usual post',
            'slug' => 'my-usual-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => 3
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $personal->id,
            'title' => 'My Personal work post',
            'slug' => 'my-personal-work-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => rand(1, 10) * 10
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $family->id,
            'title' => 'My familly personal post',
            'slug' => 'my-familly-personnal-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => 2
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My mlive post',
            'slug' => 'my-mive-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => 13
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My Under post',
            'slug' => 'my-under-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => rand(1, 10) * 10
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $family->id,
            'title' => 'My Upper post',
            'slug' => 'my-upper-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => 0
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My UnderandUpper post',
            'slug' => 'my-under-and-upper-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => rand(1, 10) * 10
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $personal->id,
            'title' => 'My Various post',
            'slug' => 'my-various-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => rand(1, 10) * 10
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My over post',
            'slug' => 'my-over-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => 8
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $family->id,
            'title' => 'My final post',
            'slug' => 'my-final-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => rand(1, 10) * 10
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $personal->id,
            'title' => 'My gigly post',
            'slug' => 'my-gigly-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => 6
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id'=> $work->id,
            'title' => 'My united post',
            'slug' => 'my-united-post',
            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula,...',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus finibus sapien ligula, non ullamcorper sem mollis volutpat. Etiam quis justo sodales, rhoncus lectus vitae, egestas lorem. Fusce ultrices nulla lacus, vitae vestibulum nisi lacinia id. Nullam eu volutpat lacus. Nam mollis ligula magna. Praesent dictum tortor et dapibus luctus. Aenean nec risus ligula. Nulla porta nibh sit amet nisi malesuada elementum. Suspendisse elementum felis lacus, sit amet rutrum lectus feugiat vitae. Maecenas tincidunt sagittis mauris, eu vehicula lacus fermentum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce eu imperdiet nibh. In eu ligula at orci facilisis iaculis.',
            'view_count' => rand(1, 10) * 10
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
