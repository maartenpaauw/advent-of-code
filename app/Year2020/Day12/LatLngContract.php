<?php

namespace App\Year2020\Day12;

interface LatLngContract
{
    public function lat(): int;

    public function lng(): int;

    public function distanceTo(LatLngContract $latLng): int;
}
