<?php

namespace Tests\Unit\Year2020\Day12;

use App\Year2020\Day12\Geo\LatLng;
use Tests\TestCase;

class LatLngTest extends TestCase
{
    /**
     * @var LatLng
     */
    private $latLng;

    protected function setUp(): void
    {
        parent::setUp();

        $this->latLng = new LatLng(17, 8);
    }

    /** @test */
    public function it_should_return_the_latitude_coordinate_correctly(): void
    {
        $this->assertEquals(17, $this->latLng->lat());
    }

    /** @test */
    public function it_should_return_the_longitude_coordinate_correctly(): void
    {
        $this->assertEquals(8, $this->latLng->lng());
    }

    /** @test */
    public function it_should_calculate_the_distance_between_two_points_correctly(): void
    {
        // Arrange
        $start = new LatLng(0, 0);

        // Act
        $distance = $this->latLng->distanceTo($start);

        // Assert
        $this->assertEquals(25, $distance);
    }
}
