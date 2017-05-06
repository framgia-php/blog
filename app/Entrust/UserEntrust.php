<?php

namespace App\Entrust;

use App\Models\Role;
use App\Models\Permission;

trait UserEntrust
{
    /**
     * Get all roles of this user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRoles()
    {
        $userId = $this->getKey();

        return Role::whereHas('users', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->get();
    }

    /**
     * Get all permissions of this user.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPermissions()
    {
        $userId = $this->getKey();

        return Permission::whereHas('roles.users', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->get();
    }

    /**
     * Determine whether this user has role.
     *
     * @param  string|\App\Eloquent\Role  $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->hasRoles([$role]);
    }

    /**
     * Determine whether this user has roles.
     *
     * @param  array  $roles
     * @param  bool  $requireAll
     * @return bool
     */
    public function hasRoles(array $roles, $requireAll = false)
    {
        $roles = collect($roles)->transform(function ($role) {
            return $role instanceof Role ? $role->name : $role;
        });

        $allRoles = $this->getRoles()->pluck('name', 'id');

        $allowedRoles = $roles->intersect($allRoles);

        if ($requireAll) {
            return $allowedRoles->count() === $roles->count();
        }

        return $allowedRoles->isNotEmpty();
    }

    /**
     * Determine whether this user has permission.
     *
     * @param  string|\App\Eloquent\Permission  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->hasPermissions([$permission]);
    }

    /**
     * Determine whether this user has permissions.
     *
     * @param  array  $permissions
     * @param  bool  $requireAll
     * @return bool
     */
    public function hasPermissions(array $permissions, $requireAll = false)
    {
        $permissions = collect($permissions)->transform(function ($permission) {
            return $permission instanceof Permission
                ? $permissions->name
                : $permission;
        });

        $allPermissions = $this->getPermissions()->pluck('name', 'id');

        $allowedPermissions = $permissions->intersect($allPermissions);

        if ($requireAll) {
            return $allowedPermissions->count() === $permissions->count();
        }

        return $allowedPermissions->isNotEmpty();
    }
}
