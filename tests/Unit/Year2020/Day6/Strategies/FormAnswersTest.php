<?php

namespace Tests\Unit\Year2020\Day6\Strategies;

use App\Year2020\Day6\CustomsDeclaration;
use App\Year2020\Day6\Strategies\FormAnswersStrategy;
use Illuminate\Support\Collection;
use Tests\TestCase;

abstract class FormAnswersTest extends TestCase
{
    abstract public function strategy(): FormAnswersStrategy;

    abstract public function expected(): array;

    /** @test */
    public function it_should_return_the_right_collection(): void
    {
        // Arrange
        $collection = new Collection([
            new CustomsDeclaration('ab'),
            new CustomsDeclaration('ac'),
        ]);

        // Assert
        $this->assertEquals($this->expected(), $this->strategy()->get($collection)->toArray());
    }
}
