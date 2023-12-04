<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.posts', [
            'posts' => Post::latest()->filter(\request(['search', 'category', 'author']))->paginate(5)->withQueryString(),
            'categories' => \App\Models\Category::all(),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $viewCount = $post->view_count + 1;
        $post->update(['view_count' => $viewCount]);
        return view('posts.post',['post' => $post]);
    }

    public function like(Post $post)
    {
        $user = auth()->user();
        $liked = $post->isLikedBy($user);

        if ($liked) {
            $post->dislike($user);
            $message = 'Like retracted.';
        } else {
            $post->like($user);
            $message = 'Thanks!';
        }

        return response()->json(['message' => $message, 'likesCount' => $post->likes()->count()]);
    }

}
