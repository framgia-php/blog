<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Managers\RolesManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
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

    /**
     * Show the form to create a new role resource.
     *
     * @param  \App\Contracts\Managers\RolesManager  $manager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function create(RolesManager $manager, Request $request)
    {
        $this->authorize('create', Role::class);

        $renderData = $manager->makeCreateViewData($request);

        return view('admin.roles.create', $renderData);
    }

    /**
     * Store a new role resource.
     *
     * @param  \App\Contracts\Managers\RolesManager  $manager
     * @param  \App\Http\Requests\Admn\RoleRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RolesManager $manager, RoleRequest $request)
    {
        $this->authorize('create', Role::class);

        $renderData = $manager->createNewRole($request);

        return redirect()->route('admin.roles.index')->with($renderData);
    }
}
