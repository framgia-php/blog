<?php

namespace App\Managers;

use Exception;
use Illuminate\Http\Request;
use App\Contracts\Repositories\UsersRepository;
use App\Contracts\Managers\UsersManager as ResourcesManager;
use App\Http\Requests\Sites\UserRequest;
use App\Models\User;

class UsersManager extends Manager implements ResourcesManager
{
    /**
     * The UsersRepository instance.
     *
     * @var \App\Contracts\Repositories\UsersRepository
     */
    protected $usersRepository;

    /**
     * Create a new UsersRepository instance.
     *
     * @param  \App\Contracts\Repositories\CategoriesRepository  $categoriesRepository
     * @return void
     */
    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeListingViewData(Request $request)
    {
        $users = $this->usersRepository->listing($request);

        return compact('users');
    }

    /**
     * Get render data for user edit view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function makeSitesUserEditView(Request $request)
    {
        $user = $request->route('username');

        return compact('user');
    }

    /**
     * Update user profile.
     *
     * @param  \App\Http\Requests\Sites\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return array
     */
    public function updateProfile(UserRequest $request, User $user)
    {
        $attributes = $request->all();

        $attributes['avatar'] = $this->uploadFile(
            config('setup.users_avatars_path'),
            $request->file('avatar'),
            $user->avatar
        );

        try {
            $this->usersRepository->update($user, $attributes);
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.update_user_profile');
        } catch (Exception $e) {
            logger()->error($e);
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.update_user_profile');
        }

        return $renderData;
    }
}
