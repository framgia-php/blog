<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface UsersRepository
{
    /**
     * Get a listing of categories resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request);

    /**
     * Find user by username.
     *
     * @param  string  $username
     * @return \App\Models\User
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findUsernameOrFail($username);
}
