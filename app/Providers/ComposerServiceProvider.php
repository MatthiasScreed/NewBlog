<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('posts.posts', function($view){
            $popularPosts = Post::popular()->take(4)->get();
            return $view->with('popularPosts',$popularPosts);
        });
    }
}
