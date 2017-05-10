<?php

namespace App\Models\Accessors;

trait UserAccessors
{
    /**
     * Types of user that can access admin pages.
     *
     * @var array
     */
    protected $accessAdminPagesTypes = [
        'super-user',
        'super-admin',
        'admin',
    ];

    /**
     * Determine whether user can access admin pages.
     *
     * @return bool
     */
    public function canAccessAdminPages()
    {
        return in_array($this->type, $this->accessAdminPagesTypes);
    }

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
        return $this->isType('member');
    }

    /**
     * Get resolved avatar path.
     *
     * @return string
     */
    public function getAvatarPathAttribute()
    {
        return config('setup.users_avatars_path') . $this->avatar;
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
