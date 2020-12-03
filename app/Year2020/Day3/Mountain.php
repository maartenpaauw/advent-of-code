<?php

namespace App\Year2020\Day3;

use Illuminate\Support\Collection;

class Mountain implements MountainContract
{
    /**
     * @var Collection
     */
    private $grid;

    public function __construct(Collection $grid)
    {
        $this->grid = $grid;
    }

    public function isTree(PositionContract $position): bool
    {
        /** @var Collection $row */
        $row = $this->grid->get($position->y());
        $column = $position->x() % $row->count();

        return '#' === $row->get($column);
    }

    public function length(): int
    {
        return $this->grid->count();
    }
}
