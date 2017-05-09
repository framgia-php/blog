<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\UsersRepository;
use App\Contracts\Managers\UsersManager as ResourcesManager;

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
}
