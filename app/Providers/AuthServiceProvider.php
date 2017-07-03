<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Category' => \App\Policies\CategoriesPolicy::class,
        'App\Models\Permission' => \App\Policies\PermissionsPolicy::class,
        'App\Models\Post' => \App\Policies\PostsPolicy::class,
        'App\Models\Role' => \App\Policies\RolesPolicy::class,
        'App\Models\User' => \App\Policies\UsersPolicy::class,
        'App\Models\Tag' => \App\Policies\TagsPolicy::class,
        'App\Models\Comment' => \App\Policies\CommentsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
