<?php

namespace Tests\Unit\Year2020\Day11\Positions;

use App\Year2020\Day11\Positions\Position;
use Tests\TestCase;

abstract class AbstractPositionTest extends TestCase
{
    abstract public function position(): Position;

    abstract public function string(): string;

    abstract public function x(): int;

    abstract public function y(): int;

    /** @test */
    public function it_should_convert_the_given_position_to_a_string_correctly(): void
    {
        $this->assertEquals($this->string(), $this->position()->toString());
    }

    /** @test */
    public function it_should_return_the_x_and_y_coordinate_correctly(): void
    {
        $this->assertEquals($this->x(), $this->position()->x());
        $this->assertEquals($this->y(), $this->position()->y());
    }
}
