<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Contracts\Managers\RolesManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
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

    /**
     * Show the form to update an exists role resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        abort_unless($role->editable, 404);

        $permissions = Permission::all();
        $permissionsChecked = request()->old('permission_ids', $role->permissions);
        $permissionsChecked = is_array($permissionsChecked) ? $permissionsChecked : [];

        $renderData = compact('role', 'permissions', 'permissionsChecked');

        return view('admin.roles.edit', $renderData);
    }

    /**
     * Update an exists role resource.
     *
     * @param  \App\Http\Requests\RoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        abort_unless($role->editable, 404);

        $attributes['label'] = $label = $request->input('label');
        $attributes['name'] = Str::slug($label, '.');
        $attributes['description'] = $request->input('description');
        $attributes['editable'] = true;
        $attributes['deleteable'] = true;

        $permissionIds = $request->input('permission_ids', []);

        DB::beginTransaction();

        try {
            $this->updateRoleWithPermissions($role, $attributes, $permissionIds);

            DB::commit();

            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.update_role');
        } catch (\Exception $e) {
            logger()->error($e);

            DB::rollback();

            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.update_role');
        }

        return redirect()->route('admin.roles.index')->with($renderData);
    }

    /**
     * Update role resource with given permissions.
     *
     * @param  \App\Models\Role  $role
     * @param  array  $attributes
     * @param  array  $permissionIds
     * @return void
     */
    protected function updateRoleWithPermissions(Role $role, array $attributes, array $permissionIds)
    {
        $role->update($attributes);

        $role->permissions()->sync($permissionIds);
    }

    /**
     * Delete an exists role resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\JsonResponse
     */
    protected function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        abort_unless($role->deleteable, 404);

        try {
            $role->delete();
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.delete_role');
            $renderData['redirect'] = route('admin.roles.index');
        } catch (\Exception $e) {
            $renderData['status'] = 'failure';
            $renderData['message'] = trans('message.failure.delete_role');
        }

        return response()->json($renderData);
    }
}
