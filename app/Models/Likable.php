<?php

namespace App\Models;

trait Likable
{
    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate(
            ['user_id' => $user ? $user->id : auth()->id()],
            ['liked' => $liked]
        );
    }

    public function dislike($user = null)
    {
        $this->likes()->where('user_id', $user ? $user->id : auth()->id())->delete();
    }

    public function isLikedBy($user)
    {
        return $user instanceof User
            && $this->likes
            && $this->likes->where('user_id', $user->id)->where('liked', true)->count() > 0;
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function toggleLike($user = null)
    {
        if ($this->isLikedBy($user)) {
            $this->dislike($user);
        } else {
            $this->like($user);
        }
    }
}
