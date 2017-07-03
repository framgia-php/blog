<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface TagsRepository
{
    /**
     * Get a listing of tags resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request);
}
