<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments();

        return response()->json($comments);
    }
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        return back()->with('success','post Updater');
    }

    public function delete(Comment $comment)
    {
        // Vérifie si l'utilisateur est authentifié
        if (!auth()->check()) {
            return back()->with('error', 'Vous devez être connecté pour supprimer un commentaire.');
        }

        // Vérifie si l'utilisateur est l'auteur du commentaire
        if (auth()->id() !== $comment->user_id) {
            return back()->with('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }

        // Supprimer le commentaire s'il répond à toutes les conditions ci-dessus
        $comment->delete();

        return back()->with('success', 'Commentaire supprimé avec succès.');
    }
}
