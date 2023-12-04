<?php

namespace App\Models;

trait Likable
{
    public function like($user = null,$liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ],[
            'liked' => $liked,
        ]);
    }

    public function dislike()
    {
        return $this->like(false);
    }

    public function isLikedBy($user)
    {
        if ($user instanceof User && $this->likes) {
            return (bool) $this->likes->where('user_id', $user->id)->where('liked', true)->count();
        }

        return false;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
