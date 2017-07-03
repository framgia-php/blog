<?php

namespace App\Console\Helpers;

trait BuildContract
{
    /**
     * Build manager contract file.
     *
     * @return void
     */
    protected function buildContract()
    {
        $contract = $this->getContractInputArgument();

        $contract = $this->getContractFullName($contract);

        $this->call('file:generate', [
            'name' => $contract,
            '--type' => 'interface',
        ]);
    }
}
