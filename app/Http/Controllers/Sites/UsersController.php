<?php

namespace App\Http\Controllers\Sites;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Managers\UsersManager;
use App\Http\Requests\Sites\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Show form to update user's profile.
     * @param  \App\Contracts\Managers\UsersManager  $manager
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(UsersManager $manager, Request $request, User $user)
    {
        $renderData = $manager->makeSitesUserEditView($request);

        return view('sites.users.edit', $renderData);
    }

    /**
     * Update user's profile.
     *
     * @param  \App\Contracts\Managers\UsersManager  $manager
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsersManager $manager, UserRequest $request, User $user)
    {
        $renderData = $manager->updateProfile($request, $user);

        return back()->with($renderData);
    }
}
