<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostCommentsController extends BackendController
{
    public function index()
    {
        $comments = Comment::with(['post', 'author'])->get();;
        return view('comments.index',compact('comments'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.delete');
    }
}
