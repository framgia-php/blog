<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface RolesRepository
{
    /**
     * Get a listing of resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request);

    /**
     * Store a new role with permissions.
     *
     * @param  array  $attributes
     * @param  array  $permissionIds
     * @return void
     */
    public function storeWithPermissions(array $attributes, array $permissionIds);
}
