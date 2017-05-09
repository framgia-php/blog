<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface PostsRepository
{
    /**
     * Get a listing of categories resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request);
}
