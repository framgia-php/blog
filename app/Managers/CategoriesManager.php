<?php

namespace App\Managers;

use Illuminate\Http\Request;
use App\Contracts\Repositories\CategoriesRepository;
use App\Contracts\Managers\CategoriesManager as ResourceManager;

class CategoriesManager extends Manager implements ResourceManager
{
    /**
     * The categories repository instance.
     *
     * @var \App\Contracts\Repositories\RolesRepository
     */
    protected $rolesRepository;

    /**
     * Create a new CategoriesRepository instance.
     *
     * @param  \App\Contracts\Repositories\CategoriesRepository  $categoriesRepository
     * @return void
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * Get render data for roles listing view.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function makeListingViewData(Request $request)
    {
        $categories = $this->categoriesRepository->listing($request);

        return compact('categories');
    }
}
