<?php

namespace App\Contracts\Managers;

use Illuminate\Http\Request;

interface TagsManager
{
    /**
     * Get render data for tags listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeListingViewData(Request $request);
}
