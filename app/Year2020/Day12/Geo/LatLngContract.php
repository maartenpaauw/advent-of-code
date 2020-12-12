<?php

namespace App\Year2020\Day12\Geo;

interface LatLngContract
{
    public function lat(): int;

    public function lng(): int;

    public function distanceTo(LatLngContract $latLng): int;
}
