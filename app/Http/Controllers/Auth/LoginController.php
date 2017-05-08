<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Contracts\Managers\AuthManager;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle login incoming request.
     *
     * @param  \App\Contracts\Managers\AuthManager  $manager
     * @param  \Illuminate\Http\RedirectResponse
     */
    public function handle(AuthManager $manager, LoginRequest $request)
    {
        if ($manager->authenticate($request)) {
            return redirect()->route('sites.home.index')->with([
                'status' => 'success',
                'message' => trans('message.success.authenticated'),
            ]);
        }

        return back()->with([
            'status' => 'failure',
            'error' => trans('message.failure.unauthenticated'),
        ]);
    }

    /**
     * Handle logout request.
     *
     * @param  \App\Contracts\Managers\AuthManager  $manager
     * @param  \Illuminate\Http\Request  $request
     */
    public function logout(AuthManager $manager, Request $request)
    {
        $manager->logout($request);

        return redirect()->route('sites.home.index');
    }
}
