<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BackendAdminController extends BackendController
{
    public function index():view
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.backend.dashboard', ['posts' => $posts]);
    }
}
