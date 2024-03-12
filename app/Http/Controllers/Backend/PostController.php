<?php

namespace App\Http\Controllers\Backend;

use App\Actions\MediaStorage;

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
            resolve(MediaStorage::class)->execute($request->thumbnail, $post, 'images/');
        }
        $post->excerpt = Str::words($request->body,100, '(...)');
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        if($request->published_at) {
            $post->published_at = date('Y-m-d', strtotime($request->published_at));
        }
        $post->save();

        return redirect()->route('admin.dashboard')->with('success','post Register');
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
            'published_at' => date('Y-m-d', strtotime($request->published_at)),
        ]);
        if ($request->thumbnail) {
            resolve(MediaStorage::class)->execute($request->thumbnail, $post, 'images/');
        }

        $post->save();

        return redirect()->route('admin.dashboard')->with('success','post Updater');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect('admin.dashboard')->with('trash-message', ['post move to trash', $post->slug]);
    }

    public function forceDestroy(Post $post)
    {
        if(Storage::exists('public/images/'.$post->thumbnail)) {
            Storage::delete('public/images/'.$post->thumbnail);
        }

        $post->forceDelete();

        return redirect('/backend/blog?status=trash')->with('message', 'Your post has been deleted successfully');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back()->with('message', 'You post has been moved from the Trash');
    }
}
