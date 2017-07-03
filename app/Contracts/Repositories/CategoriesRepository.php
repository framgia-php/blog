<?php

namespace App\Contracts\Repositories;

use Illuminate\Http\Request;

interface CategoriesRepository
{
    /**
     * Get a listing of categories resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request);

    /**
     * Get all recursive categories.
     *
     * @return array
     */
    public function getRecursiveCategoriesOptions();
}
