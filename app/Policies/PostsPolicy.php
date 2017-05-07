<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostsPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-posts');
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-posts');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->hasPermission('update-posts') || $user->isCreatorOf($post);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->hasPermission('delete-posts') || $user->isCreatorOf($post);
    }
}
