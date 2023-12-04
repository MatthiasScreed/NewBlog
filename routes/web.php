<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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



Route::get('/', [\App\Http\Controllers\BlogController::class, 'index'])->name('home');
Route::get('/about', [\App\Http\Controllers\BlogController::class, 'about'])->name('about');
Route::get('posts/{post:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('post.show');
Route::post('posts/{post}/like', [\App\Http\Controllers\BlogController::class, 'like']);

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('authors/{author:username}', function (\App\Models\User $author) {
    return view('posts.posts',[
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
})->name('authors');

Route::post('posts/{post:slug}/comment', [PostCommentsController::class, 'store']);


Route::get('admin/dashboard', [\App\Http\Controllers\Backend\BackendAdminController::class, 'index'])->name('admin.dashboard');
Route::get('admin/posts/create', [\App\Http\Controllers\Backend\PostController::class, 'create'])->name('admin.posts.create');
Route::post('admin/posts/', [\App\Http\Controllers\Backend\PostController::class, 'store'])->name('admin.posts.store');
Route::get('admin/posts/{post:slug}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::delete('admin/posts/{post:slug}/delete', [PostController::class, 'destroy'])->name('admin.posts.destroy');
Route::get('admin/categories/', [\App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('admin.category.index');
Route::get('admin/users/', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('admin.user.index');

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
