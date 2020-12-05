<?php

namespace App\Year2020\Day5;

use App\Year2020\Day5\Contracts\CoordinateContract;

class Row implements CoordinateContract
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
        return bindec(str_replace(['F', 'B'], ['0', '1'], $this->instructions));
    }
}
