<?php

namespace App\Models\Relations;

use App\Models\Comment;
use App\Models\User;

trait CommentRelations
{
    /**
     * Get comment's creator.
     *
     * @return \Illuminate\Database\Eloquent\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get comment's parent.
     *
     * @return \Illuminate\Database\Eloquent\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    /**
     * Get comment's children.
     *
     * @return \Illuminate\Database\Eloquent\HasMany
     */
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

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
