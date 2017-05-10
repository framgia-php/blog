<?php

namespace App\Contracts\Managers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;

interface CategoriesManager
{
    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function makeListingViewData(Request $request);

    /**
     * Get render data for categories create view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeCreateViewData(Request $request);

    /**
     * Get render data for categories edit view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeEditViewData(Request $request);

    /**
     * Store a new category model.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return array
     */
    public function createNewCategory(CategoryRequest $request);
}
