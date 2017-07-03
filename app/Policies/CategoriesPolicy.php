<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;

class CategoriesPolicy extends BasePolicy
{
    /**
     * Determine whether the user can view the category.
     *
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermission('view-categories');
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission('create-categories');
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return $user->hasPermission('update-categories');
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $user->hasPermission('delete-categories');
    }
}
