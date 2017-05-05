<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\PermissionRelations;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'description',
    ];
}
