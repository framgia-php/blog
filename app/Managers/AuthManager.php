<?php

namespace App\Managers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Contracts\Managers\AuthManager as ManagerContract;

class AuthManager extends Manager implements ManagerContract
{
    /**
     * Determine that login incoming request is authenticated.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return bool
     */
    public function authenticate(LoginRequest $request)
    {
        $inputs['email'] = $request->get('email');
        $inputs['password'] = $request->get('password');
        $inputs['active'] = config('setup.user_status_active');

        $remember = $request->get('remember', false);

        return Auth::attempt($inputs, $remember);
    }

    /**
     * Logout and finish login session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();
    }
}
