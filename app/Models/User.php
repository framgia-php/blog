<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Entrust\UserEntrust;
use App\Models\Relations\UserRelations;
use App\Models\Accessors\UserAccessors;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, UserEntrust, UserRelations, UserAccessors;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'fullname',
        'active',
        'avatar',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be casted into extract type.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    protected $appends = [
        'avatar_path',
    ];

    /**
     * Determine whether user is the creator of an model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return bool
     */
    public function isCreatorOf(Model $model)
    {
        return $this->getKey() === $model->user_id;
    }
}
