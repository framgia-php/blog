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
            $value = $this->replaceLikeEscapeString($request->get('keyword'));

            $builder->where('label', 'like', $value);
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
        $search = collect($this->likeEscapingReplacements)->keys();

        $value = str_replace($search, $this->likeEscapingReplacements, $value);

        return '%' . $value . '%';
    }
}
