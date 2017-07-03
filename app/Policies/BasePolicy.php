<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether user has permissions before check others.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     */
    public function before($user, $ability)
    {
        if ($user->is_super_admin) {
            return true;
        }

        return null;
    }
}
