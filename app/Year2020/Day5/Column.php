<?php

namespace App\Year2020\Day5;

use App\Year2020\Day5\Contracts\CoordinateContract;

class Column implements CoordinateContract
{
    /**
     * @var string
     */
    private $instructions;

    public function __construct(string $instructions)
    {
        $this->instructions = $instructions;
    }

    public function number(): int
    {
        return bindec(str_replace(['L', 'R'], ['0', '1'], $this->instructions));
    }
}
