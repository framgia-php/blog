<?php

namespace App\Http\Requests;

class UserRequest extends ResourceRequest
{
    public function storeRules()
    {
        return [
            'fullname' => 'required|max:50',
            'username' => ['required', 'max:50', 'regex:/^([a-z0-9.]+)$/', 'unique:users,username'],
            'email' => 'required|max:50|email|unique:users,email',
            'password' => 'required|min:6|max:24|confirmed',
        ];
    }

    public function updateRules()
    {
        return [
            //
        ];
    }
}
