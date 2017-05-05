<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\CommentRelations;

class Comment extends Model
{
    use CommentRelations;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'user_id',
        'commentable_id',
        'commentable_type',
    ];
}
