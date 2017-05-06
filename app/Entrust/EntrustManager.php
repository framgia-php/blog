<?php

namespace App\Entrust;

use Illuminate\Auth\AuthManager;

class EntrustManager
{
    /**
     * The auth manager instance.
     *
     * @var \Illuminate\Auth\AuthManager
     */
    protected $auth;

    /**
     * Create a new EntrustManager instance.
     *
     * @param  \Illuminate\Auth\AuthManager  $auth
     * @return void
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Get all roles of the current logined user.
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function roles()
    {
        return $this->check() ? $this->user()->getRoles() : null;
    }

    /**
     * Get all permissions of the current logined user.
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function permissions()
    {
        return $this->check() ? $this->user()->getPermissions() : null;
    }

    /**
     * Determine whether the current logined user has role.
     *
     * @param  string  $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->check() ? $this->user()->hasRole($role) : false;
    }

    /**
     * Determine whether the current logined user has roles.
     *
     * @param  array  $roleNames
     * @param  bool  $requireAll
     * @return bool
     */
    public function hasRoles(array $roles, $requireAll = false)
    {
        return $this->check() ? $this->user()->hasRoles($roles, $requireAll) : false;
    }

    /**
     * Determine whether the current logined user has permission.
     *
     * @param  string|\App\Eloquent\Permission  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->check() ? $this->user()->hasPermission($permission) : false;
    }

    /**
     * Determine whether the current user has permissions.
     *
     * @param  array  $permissions
     * @param  bool  $requireAll
     * @return bool
     */
    public function hasPermissions(array $permissions, $requireAll = false)
    {
        return $this->check() ? $this->user()->hasPermissions($permissions, $requireAll) : false;
    }

    /**
     * Attempt guard type by user.
     *
     * @param  mixed  $guard
     * @return \App\Auth\EntrustManager
     */
    public function guard($guard = null)
    {
        $this->shouldUse($guard);

        return $this;
    }

    /**
     * Dynamically call the default driver instance.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->auth->{$method}(...$parameters);
    }
}
