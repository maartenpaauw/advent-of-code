<?php

namespace App\Year2020\Day9;

use Iterator;

class XMAS implements Iterator
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var int
     */
    private $length;

    /**
     * @var int
     */
    private $position;

    public function __construct(array $data, int $length = 25)
    {
        $this->data = $data;
        $this->length = $length;
        $this->position = $length;
    }

    public function current(): int
    {
        return $this->data[$this->position];
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
        return isset($this->data[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = $this->length;
    }

    public function preamble(): array
    {
        return array_slice(
            $this->data,
            $this->position - $this->length,
            $this->length
        );
    }
}
