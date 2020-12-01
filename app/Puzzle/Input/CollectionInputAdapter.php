<?php

namespace App\Puzzle\Input;

use Illuminate\Support\Collection;

class CollectionInputAdapter implements Input
{
    /**
     * @var Collection
     */
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function content(): Collection
    {
        return $this->collection;
    }
}
