<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
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

Route::get('posts/{post:slug}/comments', [PostCommentsController::class, 'index'])->name('post-comments.all');
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);


Route::post('posts/{post}/comment', [PostCommentsController::class, 'store'])->name('post-comments.store');
Route::delete('comments/{comment}/delete', [PostCommentsController::class, 'delete'])->name('post-comments.delete');


Route::get('/admin/dashboard', [\App\Http\Controllers\Backend\BackendAdminController::class, 'index'])->name('admin.dashboard')->middleware(['role:superadministrator|administrator']);
Route::get('/admin/posts/create', [\App\Http\Controllers\Backend\PostController::class, 'create'])->name('admin.posts.create')->middleware(['role:superadministrator|administrator']);
Route::post('/admin/posts/', [\App\Http\Controllers\Backend\PostController::class, 'store'])->name('admin.posts.store')->middleware(['role:superadministrator|administrator']);
Route::get('admin/posts/{post}/edit', [\App\Http\Controllers\Backend\PostController::class, 'edit'])->name('admin.posts.edit')->middleware(['role:superadministrator|administrator']);
Route::put('admin/posts/{post}/update', [\App\Http\Controllers\Backend\PostController::class, 'update'])->name('admin.posts.update')->middleware(['role:superadministrator|administrator']);
Route::delete('admin/posts/{post}/delete', [\App\Http\Controllers\Backend\PostController::class, 'destroy'])->name('admin.posts.destroy')->middleware(['role:superadministrator|administrator|administrator']);
Route::delete('admin/posts/{post:}/force-destroy', [\App\Http\Controllers\Backend\PostController::class, 'forceDestroy'])->name('admin.posts.force-destroy')->middleware(['role:superadministrator']);
Route::put('admin/posts/{post}/restore', [\App\Http\Controllers\Backend\PostController::class, 'restore'])->name('admin.posts.restore')->middleware(['role:superadministrator']);

Route::get('admin/categories/', [\App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('admin.category.index')->middleware(['role:superadministrator|administrator']);
Route::get('admin/categories/create', [\App\Http\Controllers\Backend\CategoryController::class, 'create'])->name('admin.category.create')->middleware(['role:superadministrator|administrator']);
Route::post('admin/categories/', [\App\Http\Controllers\Backend\CategoryController::class, 'store'])->name('admin.category.store')->middleware(['role:superadministrator|administrator']);
Route::get('admin/categories/edit/{category}/', [\App\Http\Controllers\Backend\CategoryController::class, 'edit'])->name('admin.category.edit')->middleware(['role:superadministrator|administrator']);
Route::put('admin/categories/{category}', [\App\Http\Controllers\Backend\CategoryController::class, 'update'])->name('admin.category.update')->middleware(['role:superadministrator|administrator']);
Route::delete('admin/categories/{category}/delete', [\App\Http\Controllers\Backend\CategoryController::class, 'destroy'])->name('admin.category.delete')->middleware(['role:superadministrator']);

Route::get('admin/users/', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('admin.user.index');
Route::get('admin/users/create', [\App\Http\Controllers\Backend\UserController::class, 'create'])->name('admin.user.create')->middleware(['role:superadministrator']);
Route::post('admin/users/store', [\App\Http\Controllers\Backend\UserController::class, 'store'])->name('admin.user.store')->middleware(['role:superadministrator']);
Route::get('admin/users/edit/{user}', [\App\Http\Controllers\Backend\UserController::class, 'edit'])->name('admin.user.edit')->middleware(['role:superadministrator']);
Route::put('admin/users/update/{user}', [\App\Http\Controllers\Backend\UserController::class, 'update'])->name('admin.user.update')->middleware(['role:superadministrator']);
Route::get('admin/users/confirm/{user}', [\App\Http\Controllers\Backend\UserController::class, 'confirm'])->name('admin.user.confirm')->middleware(['role:superadministrator']);
Route::delete('admin/users/destroy/{user}', [\App\Http\Controllers\Backend\UserController::class, 'destroy'])->name('admin.users.destroy')->middleware(['role:superadministrator']);


Route::get('admin/comments', [\App\Http\Controllers\Backend\PostCommentsController::class, 'index'])->name('admin.comments.index');
Route::delete('admin/comments/{comment}/delete', [\App\Http\Controllers\Backend\PostCommentsController::class, 'destroy'])->name('admin.comments.delete');

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
