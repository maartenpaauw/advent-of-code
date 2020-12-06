<?php

namespace Tests\Unit\Year2020\Day6;

use App\Year2020\Day6\CustomsDeclaration;
use App\Year2020\Day6\Group;
use Illuminate\Support\Collection;
use Tests\TestCase;

class GroupTest extends TestCase
{
    /** @test */
    public function it_should_return_a_collection_of_unique_answers_within_a_group(): void
    {
        // Arrange
        $first = new Group(new Collection([
            new CustomsDeclaration('abc'),
        ]));

        $second = new Group(new Collection([
            new CustomsDeclaration('a'),
            new CustomsDeclaration('b'),
            new CustomsDeclaration('c'),
        ]));

        $third = new Group(new Collection([
            new CustomsDeclaration('ab'),
            new CustomsDeclaration('ac'),
        ]));

        $fourth = new Group(new Collection([
            new CustomsDeclaration('b'),
            new CustomsDeclaration('b'),
            new CustomsDeclaration('b'),
            new CustomsDeclaration('b'),
        ]));

        $last = new Group(new Collection([
            new CustomsDeclaration('b'),
        ]));

        // Assert
        $this->assertEquals(3, $first->unique()->count());
        $this->assertEquals(3, $second->unique()->count());
        $this->assertEquals(3, $third->unique()->count());
        $this->assertEquals(1, $fourth->unique()->count());
        $this->assertEquals(1, $last->unique()->count());
    }

    /** @test */
    public function it_should_return_a_collection_of_intersect_answers_within_a_group(): void
    {
        // Arrange
        $first = new Group(new Collection([
            new CustomsDeclaration('abc'),
        ]));

        $second = new Group(new Collection([
            new CustomsDeclaration('a'),
            new CustomsDeclaration('b'),
            new CustomsDeclaration('c'),
        ]));

        $third = new Group(new Collection([
            new CustomsDeclaration('ab'),
            new CustomsDeclaration('ac'),
        ]));

        $fourth = new Group(new Collection([
            new CustomsDeclaration('b'),
            new CustomsDeclaration('b'),
            new CustomsDeclaration('b'),
            new CustomsDeclaration('b'),
        ]));

        $last = new Group(new Collection([
            new CustomsDeclaration('b'),
        ]));

        // Assert
        $this->assertEquals(3, $first->matching()->count());
        $this->assertEquals(0, $second->matching()->count());
        $this->assertEquals(1, $third->matching()->count());
        $this->assertEquals(1, $fourth->matching()->count());
        $this->assertEquals(1, $last->matching()->count());
    }
}
