<?php

namespace App\AoC\Years;

use Illuminate\Support\Collection;

class CollectionYears implements Years
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function toArray(): array
    {
        return $this->collection->toArray();
    }
}
