<?php

namespace App\Year2020\Day12;

class CardinalPoint implements Point
{
    /**
     * @var string
     */
    private $label;

    /**
     * @var string[]
     */
    private $directions = [
        0 => 'N',
        90 => 'E',
        180 => 'S',
        270 => 'W',
    ];

    public function __construct(string $label)
    {
        $this->label = $label;
    }

    public function label(): string
    {
        return $this->label;
    }

    public function degrees(): int
    {
        return array_flip($this->directions)[$this->label];
    }

    public function turn(int $degrees, bool $clockwise = true): Point
    {
        $degrees = $clockwise ? $degrees : -$degrees;

        $newDegrees = abs(($this->degrees() + ($degrees + 360)) % 360);

        return new CardinalPoint($this->directions[$newDegrees]);
    }
}
