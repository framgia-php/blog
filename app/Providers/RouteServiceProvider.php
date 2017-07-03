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
     * The models namespace
     *
     * @var string
     */
    protected $modelsNamespace = 'App\Models';

    /**
     * The route that should be binded with model.
     *
     * @var array
     */
    protected $modelsBinding = [
        'role' => 'Role',
        'permission' => 'Permission',
        'user' => 'User',
        'tag' => 'Tag',
        'category' => 'Category',
        'comment' => 'Comment',
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->bindModels();

        $this->bindUsername();

        $this->bindPostSlug();

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

    /**
     * Bind model into the specific route uri.
     *
     * @param  datatype  varname
     * @return void
     */
    protected function bindModels()
    {
        foreach ($this->modelsBinding as $routeName => $modelName) {
            $modelName = $this->modelsNamespace . '\\' . $modelName;

            Route::bind($routeName, function ($id) use ($modelName) {
                return app($modelName)->findOrFail($id);
            });
        }
    }

    /**
     * Bind username with User model.
     *
     * @return void
     */
    protected function bindUsername()
    {
        Route::bind('username', function ($username) {
            return app(UsersRepository::class)->findUsernameOrFail($username);
        });
    }

    /**
     * Bind post_slug with Post model.
     *
     * @return void
     */
    protected function bindPostSlug()
    {
        Route::bind('post_slug', function ($slug) {
            $user = request()->route('username');

            $query = $user instanceof \App\Models\User
                ? $user->posts()
                : \App\Models\Post::query();

            return $query->active()->where('slug', $slug)->firstOrFail();
        });
    }
}
