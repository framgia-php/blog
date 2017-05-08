<?php

namespace App\Contracts\Repositories;

interface Repository
{
    /**
     * Get model class name matched with repository.
     *
     * @return string
     */
    public function getModelClassName();

    /**
     * Create a new model instance.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function newModel(array $attributes = []);

    /**
     * Get a new model query.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function newQuery();

    /**
     * Store a new model.
     *
     * @param  array  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function store(array $attributes);

    /**
     * Update an exists model.
     *
     * @param  \Illuminate\Database\Eloquent\Model|integer  $param
     * @param  array  $attributes
     * @return bool
     */
    public function update($param, array $attributes);

    /**
     * Destroy one or many exists models.
     *
     * @param  \Illuminate\Database\Eloquent\Model|array|integer  $param
     * @return bool
     */
    public function destroy($param);
}
