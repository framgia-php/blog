<?php

namespace App\Repositories\Eloquent;

use App\Repositories\EloquentRepository;
use App\Contracts\Repositories\Repository as BaseRepository;
use App\Contracts\Repositories\PermissionsRepository as ResourcesRepository;

class PermissionsRepository extends EloquentRepository implements BaseRepository, ResourcesRepository
{
    /**
     * Get model class name is matched with repository.
     *
     * @return string
     */
    public function getModelClassName()
    {
        return \App\Models\Permission::class;
    }
}
