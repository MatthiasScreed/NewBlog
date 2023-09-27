<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $posts = Post::latest();

    if(request('search')) {
        $posts->where('title', 'like', '%' . request('search'). '%')
            ->orWhere('body', 'like', '%'. request('search'). '%' );
    }

    return view('posts.posts', [
        'posts' => $posts->get(),
        'categories' => \App\Models\Category::all()
    ]);
});

Route::get('categories/{category:slug}', function (\App\Models\Category $category) {
    return view('posts.posts',[
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (\App\Models\User $author) {
    return view('posts.posts',[
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
})->name('category');




Route::resource('posts', PostController::class, ['as' => 'prefix']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
