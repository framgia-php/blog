<?php

namespace App\Models\Relations;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

trait CategoryRelations
{
    /**
     * Get category's creator.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all category's posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get category's parent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get category's children.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
