<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use App\Repositories\EloquentRepository;
use App\Contracts\Repositories\Repository as BaseRepository;
use App\Contracts\Repositories\RolesRepository as ResourcesRepository;

class RolesRepository extends EloquentRepository implements BaseRepository, ResourcesRepository
{
    /**
     * Get model class name is matched with repository.
     *
     * @return string
     */
    public function getModelClassName()
    {
        return \App\Models\Role::class;
    }

    /**
     * Get a listing of resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request)
    {
        $query = $this->newQuery();

        $this->buildFilterQuery($query, $request);

        return $query->paginate(config('setup.default_pagination_limit'));
    }
}
