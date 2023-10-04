<?php

namespace App\Http\Controllers;

use App\Actions\MediaStorage;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
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

        return back()->with('succes','post register');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
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
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
