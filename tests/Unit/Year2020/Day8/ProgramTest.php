<?php

namespace Tests\Unit\Year2020\Day8;

use App\Year2020\Day8\Instruction;
use App\Year2020\Day8\InstructionList;
use App\Year2020\Day8\Program;
use Tests\TestCase;

class ProgramTest extends TestCase
{
    /**
     * @var Program
     */
    private $program;

    protected function setUp(): void
    {
        parent::setUp();

        $instructionList = new InstructionList([
            new Instruction('nop +0'),
            new Instruction('acc +1'),
            new Instruction('jmp +4'),
            new Instruction('acc +3'),
            new Instruction('jmp -3'),
            new Instruction('acc -99'),
            new Instruction('acc +1'),
            new Instruction('jmp -4'),
            new Instruction('acc +6'),
        ]);

        $this->program = new Program($instructionList);
    }

    /** @test */
    public function it_should_return_the_accumulator_correctly(): void
    {
        // Act
        $accumulator = $this->program->run();

        // Assert
        $this->assertEquals(5, $accumulator);
    }

    /** @test */
    public function it_should_return_true_when_the_program_is_terminated(): void
    {
        // Act
        $this->program->run();
        $terminated = $this->program->terminated();

        // Assert
        $this->assertFalse($terminated);
    }
}
