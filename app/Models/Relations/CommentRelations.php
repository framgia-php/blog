<?php

namespace App\Models\Relations;

trait CommentRelations
{
    /**
     * Get all of the owning commentable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
