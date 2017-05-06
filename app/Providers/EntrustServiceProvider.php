<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Entrust\EntrustManager;

class EntrustServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEntrustFacade();
    }

    /**
     * Register entrust facade class.
     *
     * @return void
     */
    protected function registerEntrustFacade()
    {
        $this->app->bind('entrust', function ($app) {
            $auth = $app->make('auth');

            return new EntrustManager($auth);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [EntrustManager::class];
    }
}
