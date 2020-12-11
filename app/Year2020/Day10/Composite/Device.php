<?php

namespace App\Year2020\Day10\Composite;

class Device implements Output
{
    /**
     * @var Output
     */
    private $output;

    public function __construct(Output $output)
    {
        $this->output = $output;
    }

    public function rating(): int
    {
        return $this->output->rating() + 3;
    }

    public function difference(): array
    {
        return array_merge($this->output->difference(), [3]);
    }
}
