<?php

namespace App\Repositories;

use BadMethodCallException;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentRepository
{
    /**
     * The available query builder methods can be called dynamic by repository.
     *
     * @var array
     */
    protected $allowedQueryMethods = [
        'all',
        'first',
        'firstOrFail',
        'find',
        'findOrFail',
    ];

    /**
     * Create a new model instance.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function newModel(array $attributes = [])
    {
        $className = $this->getModelClassName();

        return new $className($attributes);
    }

    /**
     * Get a new model query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function newQuery()
    {
        if (func_num_args() === 0) {
            return $this->newModel()->query();
        }

        $args = func_get_args();

        $relations = is_array($args[0]) ? $args[0] : $args;

        return $this->newModel()->with($relations)->query();
    }

    /**
     * Store a new model.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(array $attributes)
    {
        return $this->newQuery()->create($attributes);
    }

    /**
     * Update an exists model.
     *
     * @param  \Illuminate\Database\Eloquent\Model|integer  $param
     * @param  array  $attributes
     * @return bool
     */
    public function update($param, array $attributes)
    {
        if ($param instanceof Model) {
            return $param->update($attributes);
        }

        if (is_array($param)) {
            return $this->newQuery()->whereIn('id', $param)->update($attributes);
        }

        return $this->newQuery()->find($param)->update($attributes);
    }

    /**
     * Destroy one or many exists models.
     *
     * @param  \Illuminate\Database\Eloquent\Model|array|integer  $param
     * @return bool
     */
    public function destroy($param)
    {
        if ($param instanceof Model) {
            return $param->delete();
        }

        return $this->newQuery()->destroy($param);
    }

    /**
     * Call dynamic EloquentRepository methods.
     *
     * @param  string  $method
     * @param  array  $parameters
     */
    public function __call($method, array $parameters)
    {
        $available = collect($this->allowedQueryMethods)
            ->contains(function ($allowedMethod) use ($method) {
                return $allowedMethod === $method;
            });

        if ($available) {
            return $this->newModel()->{$method}(...$parameters);
        }

        throw new BadMethodCallException('Method '. static::class .'::'. $method . ' does not exist.');
    }
}
