<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    // only implementing update / edit hooks

    public function update(User $user, Comment $comment)
    {
        // check when the update is being requested, that current user is the owner
        return (string)$user->user_id === (string)$comment->user_id;
    }

    public function edit(User $user, Comment $comment)
    {
        // check when they hit edit, before we load edit form that it is the user
        return (string)$user->user_id === (string)$comment->user_id;
    }
}
