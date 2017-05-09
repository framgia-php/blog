<?php

namespace App\Contracts\Managers;

use Illuminate\Http\Request;

interface UsersManager
{
    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeListingViewData(Request $request);
}
