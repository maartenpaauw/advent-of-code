<?php

namespace App\Commands;

use App\Puzzle\Identification\ClassIdentification;
use App\Puzzle\Identification\Identification;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class AdventScaffoldCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'advent:scaffold';

    /**
     * @var string
     */
    protected $description = 'Scaffold the folder structure for a given year';

    /**
     * @var Carbon
     */
    private $carbon;

    public function __construct(Carbon $carbon)
    {
        parent::__construct();

        $this->carbon = $carbon;
    }

    public function handle(): int
    {
        $year = $this->ask('For what year do you want to create the scaffolding?', $this->carbon->year);
        $days = new Collection(range(1, 25));

        $days->each(function (int $day) use ($year) {
            $name = new ClassIdentification(new Identification($year, $day));
            $this->callSilent('advent:generate', ['name' => $name]);
        });

        return 0;
    }
}
