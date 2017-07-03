<?php

namespace App\Contracts\Managers;

use Illuminate\Http\Request;
use App\Http\Requests\Sites\UserRequest;
use App\Models\User;

interface UsersManager
{
    /**
     * Get render data for users listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeListingViewData(Request $request);

    /**
     * Get render data for user edit view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeSitesUserEditView(Request $request);

    /**
     * Update user profile.
     *
     * @param  \App\Http\Requests\Sites\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return array
     */
    public function updateProfile(UserRequest $request, User $user);
}
