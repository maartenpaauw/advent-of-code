<?php

namespace App\AoC\Days;

use Illuminate\Support\Collection;

class CollectionDays implements Days
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function first(): int
    {
        return $this->collection->min();
    }

    public function last(): int
    {
        return $this->collection->max();
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
