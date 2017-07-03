<?php

namespace App\Contracts\Managers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;

interface AuthManager
{
    /**
     * Determine that login incoming request is authenticated.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return bool
     */
    public function authenticate(LoginRequest $request);

    /**
     * Logout and finish login session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function logout(Request $request);
}
