<?php

namespace App\Year2020\Day12;

class LatLng implements LatLngContract
{
    /**
     * @var int
     */
    private $lat;

    /**
     * @var int
     */
    private $lng;

    public function __construct(int $lat, int $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function lat(): int
    {
        return $this->lat;
    }

    public function lng(): int
    {
        return $this->lng;
    }

    public function distanceTo(LatLngContract $latLng): int
    {
        return abs($this->lat() + $latLng->lat()) + abs($this->lng() + $latLng->lng());
    }
}
