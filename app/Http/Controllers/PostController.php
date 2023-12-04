<?php

namespace App\Http\Controllers;

use App\Actions\MediaStorage;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('check-permission',['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->filter(request(['search','category','author']))->paginate(5);

        return view('posts.posts', [
            'posts' => $posts,
            'categories' => \App\Models\Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.backend.edit' , ['categories' => $categories, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {

        if ($request->thumbnail) {
            if(Storage::exists('public/images/'.$post->thumbnail)) {
                Storage::delete('public/images/'.$post->thumbnail);
            }
        }

        $post->update([
           'slug' => $request->slug,
            'title' => $request->title,
            'excerpt' => Str::words($request->body,100, '(...)'),
            'body' => $request->body,
        ]);
        resolve(MediaStorage::class)->execute($request->thumbnail, $post, 'images/', 1853,1015);

        $post->save();

        return redirect('/');
    }



    /**
     * @param StorePostRequest $request
     * @param Post $post
     *
     * @return void
     */
    public function extracted(StorePostRequest $request, Post $post): void
    {
        if ($request->hasFile('thumbnail')) {
            $image           = $request->file('thumbnail');
            $filename        = $post->title . '.' . $image->getClientOriginalExtension();
            $path            = $image->storeAs('images/', $filename);
            $post->thumbnail = $filename;
        }
    }

}
