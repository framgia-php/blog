<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\TagRelations;

class Tag extends Model
{
    use TagRelations;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'user_id',
    ];
}
