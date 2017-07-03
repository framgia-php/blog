<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\RoleRelations;

class Role extends Model
{
    use RoleRelations;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'label',
        'description',
        'editable',
        'deleteable',
    ];

    /**
     * The attributes that should be casted into extract type.
     *
     * @var array
     */
    protected $casts = [
        'editable' => 'boolean',
        'deleteable' => 'boolean',
    ];
}
