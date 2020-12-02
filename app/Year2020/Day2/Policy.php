<?php

namespace App\Year2020\Day2;

class Policy implements PolicyContract
{
    /**
     * @var int
     */
    private $lowest;

    /**
     * @var int
     */
    private $highest;

    /**
     * @var string
     */
    private $letter;

    public function __construct(int $lowest, int $highest, string $letter)
    {
        $this->lowest = $lowest;
        $this->highest = $highest;
        $this->letter = $letter;
    }

    public static function create(string $value): PolicyContract
    {
        $explode = explode(' ', str_replace('-', ' ', $value));

        return new static(...$explode);
    }

    public function passes(PasswordContract $password): bool
    {
        $count = substr_count($password, $this->letter);

        return  ($this->lowest <= $count) && ($count <= $this->highest);
    }
}
