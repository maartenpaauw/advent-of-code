<?php

namespace App\Year2020\Day12;

interface PositionContract
{
    public function point(): Point;

    public function latLng(): LatLngContract;

    public function move(string $instruction): PositionContract;
}
