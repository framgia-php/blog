<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Managers\UsersManager;
use App\Http\Controllers\Controller;
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
}
