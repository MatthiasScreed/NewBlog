<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class BlogController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('posts.posts', [
            'posts' => Post::latestFirst()->published()->filter(\request(['search', 'category', 'author']))->paginate(5)->withQueryString(),
            'categories' => \App\Models\Category::all(),
        ]);
    }

    /**
     * @return View
     */
    public function about():View
    {
        return view('about');
    }

    /**
     * @param Post $post
     *
     * @return View
     */
    public function show(Post $post):View
    {
        $viewCount = $post->view_count + 1;
        $post->update(['view_count' => $viewCount]);
        return view('posts.post',['post' => $post]);
    }

    /***
     * @param Post $post
     *
     * @return JsonResponse
     */
    public function like(Post $post):JsonResponse
    {
        $user = auth()->user();
        $post->toggleLike($user);

        $likesCount = $post->likes()->where('liked', true)->count();

        $message = $post->isLikedBy($user) ? 'Thanks!' : 'Like retracted.';

        return response()->json(['message' => $message, 'likesCount' => $likesCount]);
    }

}
