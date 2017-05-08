<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\PostRelations;

class Post extends Model
{
    use PostRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'active',
        'is_trending',
        'category_id',
        'user_id',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * The attributes that should be casted into extract type.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];
}
