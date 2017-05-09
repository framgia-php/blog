<?php

namespace App\Models\Relations;

use App\Models\Post;
use App\Models\User;

trait TagRelations
{
    /**
     * Get the creator of the tag.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get all of the posts that are assigned this tag.
     *
     * @return \Illuminate\Database\Relations\MorphedByMany
     */
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}
