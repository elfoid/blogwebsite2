<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function update(User $user, Comment $comment)
    {
        return (string)$user->user_id === (string)$comment->user_id;
    }

    public function edit(User $user, Comment $comment)
    {
        return (string)$user->user_id === (string)$comment->user_id;
    }
}
