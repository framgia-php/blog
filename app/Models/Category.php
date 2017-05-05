<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CategoryRelations;

class Category extends Model
{
    use CategoryRelations;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'active',
        'parent_id',
        'user_id',
    ];

    /**
     * The attributes that should be casted into extract type.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];
}
