<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contracts\Managers\UsersManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of users resources.
     *
     * @param  \App\Contracts\Managers\UsersManager
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(UsersManager $manager, Request $request)
    {
        $this->authorize('view', User::class);

        $renderData = $manager->makeListingViewData($request);

        return view('admin.users.index', $renderData);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        
        $renderData['roles'] = Role::pluck('label', 'id');

        return view('admin.users.create', $renderData);
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);

        $attributes = $request->input();
        $attributes['password'] = bcrypt($attributes['password']);
        $attributes['avatar'] = config('setup.default_avatar_filename');
        $attributes['type'] = config('setup.user_types.' . $request->type);
        $attributes['active'] = $request->input('active', false);

        $roleIds = $request->input('role_ids', []);

        DB::beginTransaction();

        try {
            $this->storeWithRoles($attributes, $roleIds);

            DB::commit();

            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.create_user');
        } catch (\Exception $e) {
            logger()->error($e);

            DB::rollback();

            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.create_user');
        }

        return redirect()->route('admin.users.index')->with($renderData);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $renderData['user'] = $user;
        $renderData['roles'] = Role::pluck('label', 'id');
        $renderData['rolesSelected'] = $user->roles()->pluck('id')->all();

        return view('admin.users.edit', $renderData);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $attributes['type'] = config('setup.user_types.' . $request->type);
        $attributes['active'] = $request->input('active', false);

        $roleIds = $request->input('role_ids', []);

        DB::beginTransaction();

        try {
            $this->updateWithRoles($user, $attributes, $roleIds);

            DB::commit();

            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.update_user');
        } catch (\Exception $e) {
            logger()->error($e);

            DB::rollback();

            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.update_user');
        }

        return redirect()->route('admin.users.index')->with($renderData);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        abort_unless(Auth::id() === $user->id, 404);

        try {
            $user->delete();
            $status = 200;
            $renderData['status'] = 'success';
            $renderData['message'] = trans('message.success.delete_user');
        } catch (\Exception $e) {
            logger()->error($e);
            $status = 500;
            $renderData['status'] = 'failure';
            $renderData['error'] = trans('message.failure.delete_user');
        }

        return response()->json($renderData, $status);
    }

    protected function storeWithRoles(array $attributes, array $roleIds)
    {
        $user = User::create($attributes);

        $user->roles()->attach($roleIds);

        return $user;
    }

    protected function updateWithRoles(User $user, array $attributes, array $roleIds)
    {
        $user->update($attributes);

        $user->roles()->sync($roleIds);

        return $user;
    }
}
