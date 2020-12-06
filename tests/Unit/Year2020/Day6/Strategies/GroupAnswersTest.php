<?php

namespace Tests\Unit\Year2020\Day6\Strategies;

use App\Year2020\Day6\CustomsDeclaration;
use App\Year2020\Day6\Group;
use App\Year2020\Day6\Strategies\GroupAnswersStrategy;
use Illuminate\Support\Collection;
use Tests\TestCase;

abstract class GroupAnswersTest extends TestCase
{
    abstract public function strategy(): GroupAnswersStrategy;

    abstract public function expected(): int;

    /** @test */
    public function it_should_return_the_correct_count(): void
    {
        // Arrange
        $collection = new Collection([
            new Group(new Collection([
                new CustomsDeclaration('abc'),
            ])),
            new Group(new Collection([
                new CustomsDeclaration('a'),
                new CustomsDeclaration('b'),
                new CustomsDeclaration('c'),
            ])),
            new Group(new Collection([
                new CustomsDeclaration('ab'),
                new CustomsDeclaration('ac'),
            ])),
            new Group(new Collection([
                new CustomsDeclaration('b'),
                new CustomsDeclaration('b'),
                new CustomsDeclaration('b'),
                new CustomsDeclaration('b'),
            ])),
            new Group(new Collection([
                new CustomsDeclaration('b'),
            ])),
        ]);

        // Assert
        $this->assertEquals($this->expected(), $this->strategy()->count($collection));
    }
}
