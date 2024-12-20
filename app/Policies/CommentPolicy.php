<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    // only implementing update / edit / create hooks

    public function create(User $user)
    {
        // based only on the single flag
        return $user->can_comment;
    }

    public function update(User $user, Comment $comment)
    {
        // check when the update is being requested, that current user is the owner but also that
        // they are allowed to comment
        return $user->can_comment && (string)$user->user_id === (string)$comment->user_id;

    }

    public function edit(User $user, Comment $comment)
    {

        // check when they hit edit, before we load edit form that it is the user and allowed to comment
        return $user->can_comment && (string)$user->user_id === (string)$comment->user_id;
    }
}
