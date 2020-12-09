<?php

namespace App\Year2020\Day9;

use Iterator;

class ContiguousSets implements Iterator
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var int
     */
    private $position;

    /**
     * @var int
     */
    private $size;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->position = 0;
        $this->size = 2;
    }

    public function current(): ContiguousSet
    {
        return new ContiguousSet(array_slice(
            $this->data,
            $this->position,
            $this->size
        ));
    }

    public function next(): void
    {
        if ($this->position + $this->size === count($this->data)) {
            $this->position = 0;
            ++$this->size;
        } else {
            ++$this->position;
        }
    }

    public function key(): array
    {
        return [$this->position, $this->size];
    }

    public function valid(): bool
    {
        return isset($this->data[$this->position]) && $this->size <= count($this->data);
    }

    public function rewind()
    {
        $this->position = 0;
        $this->size = 2;
    }
}
