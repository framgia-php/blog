<?php

namespace App\Providers;

use App\Support\ContractsServiceProvider as ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->registerRepository('UsersRepository');
    }

    /**
     * Register a repository contract binding.
     *
     * @param  string  $contract
     * @param  string  $implementation
     * @return void
     */
    protected function registerRepository($name)
    {
        $this->app->singleton(
            $this->resolveFullContractName($name, 'Repositories'),
            $this->resolveFullImplementationName($name, 'Repositories\Eloquent')
        );
    }
}
