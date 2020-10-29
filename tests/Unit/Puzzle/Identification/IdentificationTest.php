<?php

namespace Tests\Unit\Puzzle\Identification;

use App\Puzzle\Identification\Identification;
use Tests\TestCase;

class IdentificationTest extends TestCase
{
    /**
     * @var Identification
     */
    private $identification;

    protected function setUp(): void
    {
        $this->identification = new Identification(2020, 26);
    }

    /** @test */
    public function it_should_return_the_correct_identification_string(): void
    {
        // Assert
        $this->assertEquals('2020.26', $this->identification);
    }

    /** @test */
    public function it_should_return_the_correct_year(): void
    {
        $this->assertEquals(2020, $this->identification->year());
    }

    /** @test */
    public function it_should_return_the_correct_day(): void
    {
        $this->assertEquals(26, $this->identification->day());
    }
}
