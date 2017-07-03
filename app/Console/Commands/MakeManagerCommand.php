<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Helpers\BuildContract;
use App\Console\Helpers\ContractClassInputs;

class MakemanagerCommand extends Command
{
    use BuildContract, ContractClassInputs;

    /**
     * The name and signature of the make:manager console command.
     *
     * @var string
     */
    protected $signature = 'make:manager
        {contract : The manager contract}
        {class : The manager class}';

    /**
     * The make:manager console command description.
     *
     * @var string
     */
    protected $description = 'Create a design pattern manager';

    /**
     * The manager contract root namespace nested "App" namespace.
     *
     * @var string
     */
    protected $contractRootNamespace = 'Contracts\Managers';

    /**
     * The manager class root namespace nested "App" namespace.
     *
     * @var string
     */
    protected $classRootNamespace = 'Managers';

    /**
     * Execute the make:manager console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->buildContract();

        $this->buildClass();
    }

    /**
     * Build manager class file.
     *
     * @return void
     */
    protected function buildClass()
    {
        $class = $this->getClassInputArgument();

        $class = $this->getClassFullName($class);

        $this->call('file:generate', [
            'name' => $class,
            '--type' => 'class',
            '--stub' => 'manager',
        ]);
    }
}
