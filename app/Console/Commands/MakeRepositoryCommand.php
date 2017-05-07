<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Helpers\BuildContract;
use App\Console\Helpers\ContractClassInputs;

class MakeRepositoryCommand extends Command
{
    use BuildContract, ContractClassInputs;

    /**
     * The name and signature of the make:repository console command.
     *
     * @var string
     */
    protected $signature = 'make:repository
        {contract : The repository contract}
        {class : The repository class}
        {--type=eloquent : Type of repository}';

    /**
     * The make:repository console command description.
     *
     * @var string
     */
    protected $description = 'Create a design pattern repository';

    /**
     * The repository contract root namespace nested "App" namespace.
     *
     * @var string
     */
    protected $contractRootNamespace = 'Contracts\Repositories';

    /**
     * The repository class root namespace nested "App" namespace.
     *
     * @var string
     */
    protected $classRootNamespace = 'Repositories';

    /**
     * Execute the make:repository console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->buildContract();

        $this->buildClass();
    }

    /**
     * Build repository class file.
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
            '--stub' => 'repository',
        ]);
    }
}
