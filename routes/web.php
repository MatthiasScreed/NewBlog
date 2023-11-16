<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Services\Newsletters;
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



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

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
})->name('authors');

Route::post('posts/{post:slug}/comment', [PostCommentsController::class, 'store']);




//Route::resource('posts', PostController::class, ['as' => 'prefix']);

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin')->name('admin.posts.create');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/newsletter', NewsletterController::class);

require __DIR__.'/auth.php';
