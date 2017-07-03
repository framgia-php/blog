<?php

namespace App\Support;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

abstract class ContractsServiceProvider extends ServiceProvider
{
    /**
     * Root namespace to locates contracts and implementations.
     *
     * @var arrray
     */
    protected $rootNamespace = [
        'contract' => 'App\Contracts',
        'implementation' => 'App',
    ];

    /**
     * Resolve name of elment by it's type.
     *
     * @param  string  $type
     * @param  string  $name
     * @param  string  $subNamespace
     * @return string
     */
    protected function resolveName($type, $name, $subNamespace = false)
    {
        return $subNamespace
            ? $this->rootNamespace[$type] .'\\'. $subNamespace .'\\'. $name
            : $this->rootNamespace[$type] .'\\'. $name;
    }

    /**
     * Get full contract name.
     *
     * @param  string  $contract
     * @param  string  $subNamespace
     * @return string
     */
    protected function resolveFullContractName($contract, $subNamespace = false)
    {
        return $this->resolveName('contract', $contract, $subNamespace);
    }

    /**
     * Get full repository imeplementation name.
     *
     * @param  string  $imeplementation
     * @param  string  $subNamespace
     * @return string
     */
    protected function resolveFullImplementationName($implementation, $subNamespace = false)
    {
        return $this->resolveName('implementation', $implementation, $subNamespace);
    }
}
