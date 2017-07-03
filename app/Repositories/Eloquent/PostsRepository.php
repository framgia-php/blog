<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Repositories\EloquentRepository;
use App\Contracts\Repositories\Repository as BaseRepository;
use App\Contracts\Repositories\PostsRepository as ResourcesRepository;

class PostsRepository extends EloquentRepository implements BaseRepository, ResourcesRepository
{
    /**
     * The fields that users can filter.
     *
     * @var array
     */
    protected $filterFields = [
        'title' => 'like',
    ];

    /**
     * Get model class name is matched with repository.
     *
     * @return string
     */
    public function getModelClassName()
    {
        return \App\Models\Post::class;
    }

    /**
     * Get a listing of posts resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request)
    {
        $query = $this->newModel()->with('creator');

        $this->buildFilterQuery($query, $request);

        $this->buildRelationsFilterQuery($query, $request);

        return $query->paginate(config('setup.default_pagination_limit'));
    }

    protected function buildRelationsFilterQuery(Builder $query, Request $request)
    {
        if ($request->has('keyword')) {
            $keyword = $this->replaceLikeEscapeString($request->query('keyword'));

            $query->orWhereHas('creator', function ($query) use ($keyword) {
                $query->where('fullname', 'like', $keyword);
            });
        }
    }
}
