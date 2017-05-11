<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Contracts\Repositories\UsersRepository;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('role', \App\Models\Role::class);
        Route::bind('permission', \App\Models\Permission::class);
        Route::bind('user', \App\Models\User::class);
        Route::bind('post', \App\Models\Post::class);
        Route::bind('tag', \App\Models\Tag::class);
        Route::bind('category', \App\Models\Category::class);
        Route::bind('comment', function ($comment) {
            return \App\Models\Comment::findOrFail($comment);
        });

        Route::bind('username', function ($username) {
            return app(UsersRepository::class)->findUsernameOrFail($username);
        });

        Route::bind('post_slug', function ($slug) {
            $user = request()->route('username');

            $query = $user instanceof \App\Models\User
                ? $user->posts()
                : \App\Models\Post::query();

            return $query->where('slug', $slug)->firstOrFail();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
