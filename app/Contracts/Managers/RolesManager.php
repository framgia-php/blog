<?php

namespace App\Contracts\Managers;

use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

interface RolesManager
{
    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function makeListingViewData(Request $request);

    /**
     * Get render data for roles create view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function makeCreateViewData(Request $request);

    /**
     * Create a new role resource..
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @return \Illuminate\View\View
     */
    public function createNewRole(RoleRequest $request);
}
