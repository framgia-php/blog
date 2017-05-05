<?php

namespace App\Models\Relations;

use App\Models\Post;

trait TagRelations
{
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
