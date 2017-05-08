<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootBladeDirectives();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot some new blade directives.
     *
     * @return void
     */
    protected function bootBladeDirectives()
    {
        Blade::directive('login', function () {
            return '<?php if (Auth::check()): ?>';
        });

        Blade::directive('endlogin', function () {
            return '<?php endif; ?>';
        });

        Blade::directive('guest', function () {
            return '<?php if (Auth::guest()): ?>';
        });

        Blade::directive('endguest', function () {
            return '<?php endif; ?>';
        });
    }
}
