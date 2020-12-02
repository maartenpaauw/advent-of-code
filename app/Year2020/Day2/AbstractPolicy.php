<?php

namespace App\Year2020\Day2;

abstract class AbstractPolicy implements PolicyContract
{
    /**
     * @var int
     */
    protected $first;

    /**
     * @var int
     */
    protected $second;

    /**
     * @var string
     */
    protected $letter;

    public function __construct(int $lowest, int $highest, string $letter)
    {
        $this->first = $lowest;
        $this->second = $highest;
        $this->letter = $letter;
    }

    public static function create(string $value): PolicyContract
    {
        $explode = explode(' ', str_replace('-', ' ', $value));

        return new static(...$explode);
    }
}
