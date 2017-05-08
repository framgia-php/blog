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
        'App\Models\Category' => 'App\Policies\CategoriesPolicy',
        'App\Models\Permission' => 'App\Policies\PermissionsPolicy',
        'App\Models\Post' => 'App\Policies\PostsPolicy',
        'App\Models\Role' => 'App\Policies\RolesPolicy',
        'App\Models\Tag' => 'App\Policies\TagsPolicy',
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
