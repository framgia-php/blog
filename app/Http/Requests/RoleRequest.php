<?php

namespace App\Http\Requests;

class RoleRequest extends ResourceRequest
{
    /**
     * Apply rules for store role resource request.
     *
     * @return array
     */
    protected function storeRules()
    {
        return [
            'label' => 'required|max:255|unique:roles',
        ];
    }

    /**
     * Apply rules for update role resource request.
     *
     * @return array
     */
    protected function updateRules()
    {
        $id = $this->route('role')->id;

        return [
            'label' => 'required|max:255|unique:roles,label,' . $id,
        ];
    }
}
