<?php

namespace App\Contracts\Managers;

use Illuminate\Http\Request;

interface RolesManager
{
    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function makeListingViewData(Request $request);
}
