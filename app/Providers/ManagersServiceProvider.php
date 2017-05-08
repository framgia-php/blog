<?php

namespace App\Providers;

use App\Support\ContractsServiceProvider as ServiceProvider;

class ManagersServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerManager('AuthManager');
    }

    /**
     * Register a repository contract binding.
     *
     * @param  string  $contract
     * @param  string  $implementation
     * @return void
     */
    protected function registerManager($name)
    {
        $this->app->singleton(
            $this->resolveFullContractName($name, 'Managers'),
            $this->resolveFullImplementationName($name, 'Managers')
        );
    }
}
