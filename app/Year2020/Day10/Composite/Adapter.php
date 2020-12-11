<?php

namespace App\Year2020\Day10\Composite;

class Adapter implements Output
{
    /**
     * @var Output
     */
    private $output;

    /**
     * @var int
     */
    private $rating;

    public function __construct(Output $output, int $rating)
    {
        $this->output = $output;
        $this->rating = $rating;
    }

    public function rating(): int
    {
        return $this->rating;
    }

    public function difference(): array
    {
        return array_merge($this->output->difference(), [$this->rating - $this->output->rating()]);
    }
}
