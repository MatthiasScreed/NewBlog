<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{
    public $post;
    public $comments;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->comments = $post->comments()->with('author')->get();
    }
    public function render()
    {
        return view('livewire.comments');
    }
}
