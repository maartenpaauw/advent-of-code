<?php

namespace App\Year2020\Day10;

class Device implements Output
{
    /**
     * @var Output
     */
    private $adapter;

    public function __construct(Output $adapter)
    {
        $this->adapter = $adapter;
    }

    public function rating(): int
    {
        return $this->adapter->rating() + 3;
    }

    public function difference(Output $output): int
    {
        return abs($output->rating() - $this->rating());
    }
}
