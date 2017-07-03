<?php

namespace App\Policies;

use App\Models\User;

class PermissionsPolicy extends BasePolicy
{
    /**
     * Determine whether user has permissions before check others.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     */
    public function before($user, $ability)
    {
        return $user->is_super_admin;
    }
}
