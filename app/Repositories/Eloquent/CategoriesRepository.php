<?php

namespace App\Repositories\Eloquent;

use Illuminate\Http\Request;
use App\Repositories\EloquentRepository;
use App\Contracts\Repositories\Repository as BaseRepository;
use App\Contracts\Repositories\CategoriesRepository as ResourcesRepository;

class CategoriesRepository extends EloquentRepository implements BaseRepository, ResourcesRepository
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
        return \App\Models\Category::class;
    }

    /**
     * Get a listing of resources with user's request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listing(Request $request)
    {
        $query = $this->newQuery()->orderby('position')->orderBy('id');

        $this->buildFilterQuery($query, $request);

        return $query->paginate(config('setup.default_pagination_limit'));
    }

    /**
     * Get all recursive categories.
     *
     * @return array
     */
    public function getRecursiveCategoriesOptions()
    {
        $categories = $this->all(['id', 'parent_id', 'title']);

        $options = $this->recursive($categories, 0);

        return $options;
    }

    /**
     * Recursive categories.
     *
     * @param  \Illuminate\Database\Eloquent\Collection
     * @param  integer  $parentId
     * @param  string  $indent
     * @param  array  $options
     * @return array
     */
    protected function recursive($categories, $parentId = 0, $indent = '', $options = [])
    {
        foreach ($categories as $key => $category) {
            if ($category->parent_id === $parentId) {
                $options[$category->id] = $indent . $category->title;
                $categories->pull($key);
                $options = $this->recursive($categories, $category->id, $indent . '---', $options);
            }
        }

        return $options;
    }
}
