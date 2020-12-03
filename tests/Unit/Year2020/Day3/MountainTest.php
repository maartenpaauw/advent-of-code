<?php

namespace Tests\Unit\Year2020\Day3;

use App\Year2020\Day3\Mountain;
use App\Year2020\Day3\MountainContract;
use App\Year2020\Day3\Position;
use Illuminate\Support\Collection;
use Tests\TestCase;

class MountainTest extends TestCase
{
    /**
     * @var MountainContract
     */
    private $mountain;

    protected function setUp(): void
    {
        parent::setUp();

        $collection = new Collection([
            new Collection(['#', '.', '#']),
            new Collection(['.', '.', '#']),
            new Collection(['.', '#', '#']),
        ]);

        $this->mountain = new Mountain($collection);
    }

    /** @test */
    public function it_should_return_true_if_a_given_position_is_a_tree(): void
    {
        // Assert
        $this->assertTrue($this->mountain->isTree(new Position(2, 1)));
        $this->assertFalse($this->mountain->isTree(new Position(1, 1)));
    }

    /** @test */
    public function it_should_return_the_length_correctly(): void
    {
        // Act
        $length = $this->mountain->length();

        // Assert
        $this->assertEquals(3, $length);
    }
}
