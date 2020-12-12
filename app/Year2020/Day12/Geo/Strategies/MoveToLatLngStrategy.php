<?php

namespace App\Year2020\Day12\Geo\Strategies;

use App\Year2020\Day12\Geo\LatLng;
use App\Year2020\Day12\Geo\LatLngContract;

class MoveToLatLngStrategy implements LatLngStrategies
{
    /**
     * @var LatLngContract
     */
    private $from;

    /**
     * @var LatLngContract
     */
    private $to;

    public function __construct(LatLngContract $from, LatLngContract $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function handle(string $action, int $value): LatLngContract
    {
        return new LatLng(
            $this->to->lat() * $value + $this->from->lat(),
            $this->to->lng() * $value + $this->from->lng()
        );
    }
}
