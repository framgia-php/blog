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

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', config('setup.status_active'));
    }

    public function scopeTrending($query)
    {
        return $query->where('is_trending', config('setup.post_is_trending'));
    }

    public function getSitesPublishedAtAttribute()
    {
        return date('F d, Y', strtotime($this->published_at));
    }
}
