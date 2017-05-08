<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\RolesRepository;
use App\Contracts\Managers\RolesManager as ResourceManager;

class RolesManager extends Manager implements ResourceManager
{
    /**
     * The roles repository instance.
     *
     * @var \App\Contracts\Repositories\RolesRepository
     */
    protected $rolesRepository;

    /**
     * Create new RolesManager instance.
     *
     * @param  \App\Contracts\Repositories\RolesRepository  $rolesRepository
     * @return void
     */
    public function __construct(RolesRepository $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function makeListingViewData(Request $request)
    {
        $roles = $this->rolesRepository->listing($request);

        return compact('roles');
    }
}
