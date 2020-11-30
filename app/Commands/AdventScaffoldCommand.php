<?php

namespace App\Commands;

use App\AoC\Days\Days;
use App\Puzzle\Identification\ClassIdentification;
use App\Puzzle\Identification\Identification;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

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

    /**
     * @var Days
     */
    private $days;

    public function __construct(Carbon $carbon, Days $days)
    {
        parent::__construct();

        $this->carbon = $carbon;
        $this->days = $days;
    }

    public function handle(): int
    {
        $year = $this->ask('For what year do you want to create the scaffolding?', $this->carbon->year);

        foreach ($this->days->toArray() as $day) {
            $name = new ClassIdentification(new Identification($year, $day));
            $this->callSilent(AdventGenerateCommand::class, ['name' => $name]);
        }

        return 0;
    }
}
