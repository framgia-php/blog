<?php

namespace App\Models\Relations;

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
