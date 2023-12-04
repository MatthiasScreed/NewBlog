<?php

namespace App\Http\Controllers\Backend;

use App\Actions\MediaStorage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends BackendController
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('posts.backend.create' , ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();

        $post->user_id = auth()->user()->id;
        $post->slug = $request->slug;
        $post->title = $request->title;
        if($request->thumbnail) {
            resolve(MediaStorage::class)->execute($request->thumbnail, $post, 'images/', 1920,1920);
        }
        $post->excerpt = Str::words($request->body,100, '(...)');
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->save();

        return back()->with('success','post register');

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
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect('/');
    }

    public function forceDestroy(Post $post)
    {
        if(Storage::exists('public/images/'.$post->thumbnail)) {
            Storage::delete('public/images/'.$post->thumbnail);
        }
        $post->forceDelete();

        return redirect('/');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back()->with('message', 'You post has been moved from the Trash');
    }
}
