<?php

namespace App\Console\Helpers;

trait ContractClassInputs
{
    /**
     * Get contract argument.
     *
     * @return string
     */
    protected function getContractInputArgument()
    {
        $contract = $this->argument('contract');

        return trim($contract);
    }

    /**
     * Get class argument.
     *
     * @return string
     */
    protected function getClassInputArgument()
    {
        $class = $this->argument('class');

        return trim($class);
    }

    /**
     * Get contract full name.
     *
     * @param  string  $contract
     * @return string
     */
    protected function getContractFullName($contract)
    {
        $contract = $this->contractRootNamespace . '\\' . $contract;

        return rtrim($contract, '\\');
    }

    /**
     * Get class full name.
     *
     * @param  string  $class
     * @return string
     */
    protected function getClassFullName($class)
    {
        $class = $this->classRootNamespace . '\\' . $class;

        return rtrim($class, '\\');
    }
}
