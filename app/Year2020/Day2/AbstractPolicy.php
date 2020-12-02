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

    public function __construct(string $policy)
    {
        [$this->first, $this->second, $this->letter] = preg_split('([- ])', $policy);
    }
}
