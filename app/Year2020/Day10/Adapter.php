<?php

namespace App\Year2020\Day10;

class Adapter implements Output
{
    /**
     * @var int
     */
    private $rating;

    public function __construct(int $rating)
    {
        $this->rating = $rating;
    }

    public function rating(): int
    {
        return $this->rating;
    }

    public function difference(Output $output): int
    {
        return abs($output->rating() - $this->rating);
    }
}
