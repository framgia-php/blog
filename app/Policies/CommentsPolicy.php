<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

class CommentsPolicy extends BasePolicy
{
    /**
     * Determine whether the user can create comments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $user->can('update', $comment->commentable) || $user->isCreatorOf($comment);
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->can('delete', $comment->commentable) || $user->isCreatorOf($comment);
    }
}
