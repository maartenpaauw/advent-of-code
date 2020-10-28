<?php

namespace App\Commands;

use Illuminate\Console\GeneratorCommand;

class SolutionGenerateCommand extends GeneratorCommand
{
    /**
     * @var string
     */
    protected $signature = 'advent:generate {name}';

    /**
     * @var string
     */
    protected $description = 'Create a solution class from a stub';

    protected function getStub(): string
    {
        return base_path('stubs/solution.stub');
    }
}
