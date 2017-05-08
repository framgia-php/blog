<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Managers\RolesManager;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of roles resources.
     *
     * @param  \App\Contracts\Managers\RolesManager  $manager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(RolesManager $manager, Request $request)
    {
        $this->authorize('view', Role::class);

        $renderData = $manager->makeListingViewData($request);

        return view('admin.roles.index', $renderData);
    }
}
