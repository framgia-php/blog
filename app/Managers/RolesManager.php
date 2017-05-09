<?php

namespace App\Managers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Contracts\Repositories\RolesRepository;
use App\Contracts\Repositories\PermissionsRepository;
use App\Contracts\Managers\RolesManager as ResourceManager;
use App\Http\Requests\Admin\RoleRequest;

class RolesManager extends Manager implements ResourceManager
{
    /**
     * The roles repository instance.
     *
     * @var \App\Contracts\Repositories\RolesRepository
     */
    protected $rolesRepository;

    /**
     * The permissions repository instance.
     *
     * @var \App\Contracts\Repositories\PermissionsRepository
     */
    protected $permissionsRepository;

    /**
     * Create new RolesManager instance.
     *
     * @param  \App\Contracts\Repositories\RolesRepository  $rolesRepository
     * @return void
     */
    public function __construct(
        RolesRepository $rolesRepository,
        PermissionsRepository $permissionsRepository
    ) {
        $this->rolesRepository = $rolesRepository;
        $this->permissionsRepository = $permissionsRepository;
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

    /**
     * Get render data for roles create view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function makeCreateViewData(Request $request)
    {
        $permissions = $this->permissionsRepository->all();

        $permissionsChecked = $request->old('permission_ids');

        $permissionsChecked = is_array($permissionsChecked) ? $permissionsChecked : [];

        return compact('permissions', 'permissionsChecked');
    }

    /**
     * Create a new role resource..
     *
     * @param  \App\Http\Requests\Admin\RoleRequest  $request
     * @return \Illuminate\View\View
     */
    public function createNewRole(RoleRequest $request)
    {
        $attributes = $request->all();

        $attributes['name'] = Str::slug($request->get('title'));

        $permissionIds = $request->get('permission_ids');

        try {
            $this->rolesRepository->storeWithPermissions($attributes, $permissionIds);
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.create_role');
        } catch (Exception $e) {
            logger()->error($e);
            $renderData['status'] = 'failure';
            $renderData['message'] = trans('message.failure.create_role');
        }

        return $renderData;
    }
}
