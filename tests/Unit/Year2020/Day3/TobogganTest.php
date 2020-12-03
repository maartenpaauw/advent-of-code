<?php

namespace Tests\Unit\Year2020\Day3;

use App\Year2020\Day3\Mountain;
use App\Year2020\Day3\Position;
use App\Year2020\Day3\Slope;
use App\Year2020\Day3\Toboggan;
use Illuminate\Support\Collection;
use Tests\TestCase;

class TobogganTest extends TestCase
{
    /** @test */
    public function it_should_return_the_trees_encountered_count(): void
    {
        // Arrange
        $mountain = new Mountain(new Collection([
            new Collection(['.', '.', '#', '#', '.', '.', '.', '.', '.', '.', '.']),
            new Collection(['#', '.', '.', '.', '#', '.', '.', '.', '#', '.', '.']),
            new Collection(['.', '#', '.', '.', '.', '.', '#', '.', '.', '#', '.']),
            new Collection(['.', '.', '#', '.', '#', '.', '.', '.', '#', '.', '#']),
            new Collection(['.', '#', '.', '.', '.', '#', '#', '.', '.', '#', '.']),
            new Collection(['.', '.', '#', '.', '#', '#', '.', '.', '.', '.', '.']),
            new Collection(['.', '#', '.', '#', '.', '#', '.', '.', '.', '.', '#']),
            new Collection(['.', '#', '.', '.', '.', '.', '.', '.', '.', '.', '#']),
            new Collection(['#', '.', '#', '#', '.', '.', '.', '#', '.', '.', '.']),
            new Collection(['#', '.', '.', '.', '#', '#', '.', '.', '.', '.', '#']),
            new Collection(['.', '#', '.', '.', '#', '.', '.', '.', '#', '.', '#']),
        ]));

        $slope = new Slope(3, 1);
        $position = new Position(0, 0);
        $toboggan = new Toboggan($slope, $mountain, $position);

        // Act
        $toboggan->slide();
        $trees = $toboggan->trees();

        // Assert
        $this->assertEquals(7, $trees);
    }
}
