<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait BuildQuery
{
    /**
     * Characters should be escape when search by 'like'.
     *
     * @var array
     */
    protected $likeEscapingReplacements = [
        '%' => '\%',
        '_' => '\_',
        '\\' => '\\\\',
    ];

    /**
     * Build listing query before call paginate.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function buildFilterQuery(Builder $builder, Request $request)
    {
        if ($request->has('keyword')) {
            $value = $request->get('keyword');

            $filterFields = isset($this->filterFields) ? $this->filterFields : [];

            foreach ($filterFields as $field => $operator) {
                $this->applyWhereClauseForQuery($builder, $field, $operator, $value);
            }
        }
    }

    /**
     * Replace all escape string when search by like operator.
     *
     * @param  string  $value
     * @return string
     */
    protected function replaceLikeEscapeString($value)
    {
        $search = collect($this->likeEscapingReplacements)->keys()->all();

        $value = str_replace($search, $this->likeEscapingReplacements, $value);

        return '%' . $value . '%';
    }

    /**
     * Apply where filter clause for query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  string  $field
     * @param  string  $operator
     * @param  string  $value
     * @return string
     */
    protected function applyWhereClauseForQuery(Builder $builder, $field, $operator, $value)
    {
        if ($operator === 'like') {
            $value = $this->replaceLikeEscapeString($value);
        }

        $builder->orWhere($field, $operator, $value);
    }
}
