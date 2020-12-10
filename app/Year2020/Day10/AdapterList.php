<?php

namespace App\Year2020\Day10;

use Iterator;

class AdapterList implements Iterator
{
    /**
     * @var int[]
     */
    private $ratings;

    /**
     * @var int
     */
    private $position;

    public function __construct(array $ratings)
    {
        sort($ratings);

        $this->ratings = $ratings;
        $this->position = 0;
    }

    public function current(): Output
    {
        return new Adapter($this->ratings[$this->position]);
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->ratings[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
