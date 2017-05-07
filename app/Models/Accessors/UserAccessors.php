<?php

namespace App\Models\Accessors;

trait UserAccessors
{
    /**
     * Determine whether user is super admin.
     *
     * @return bool
     */
    public function getIsSuperAdminAttribute()
    {
        return $this->isType('super-admin') || $this->isType('super-user');
    }

    /**
     * Determine whether user is admin.
     *
     * @return bool
     */
    public function getIsAdminAttribute()
    {
        return $this->isType('admin');
    }

    /**
     * Determine whether user is member.
     *
     * @return bool
     */
    public function getIsMemberAttribute()
    {
        return ! ($this->is_super_admin || $this->is_admin);
    }

    /**
     * Determine whether user is type.
     *
     * @param  string  $type
     * @return bool
     */
    protected function isType($type)
    {
        return $this->type === $type;
    }
}
