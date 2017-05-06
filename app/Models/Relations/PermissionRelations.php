<?php

namespace App\Models\Relations;

use App\Models\Role;

trait PermissionRelations
{
    /**
     * Get all permission's roles.
     *
     * @return \Illuminate\Database\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
