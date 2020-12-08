<?php

namespace Tests\Unit\Year2020\Day8;

use App\Year2020\Day8\Instruction;
use Tests\TestCase;

class InstructionTest extends TestCase
{
    /** @test */
    public function it_should_parse_an_instruction_correctly(): void
    {
        // Arrange
        $positiveInstruction = new Instruction('acc +3');
        $negativeInstruction = new Instruction('jmp -4');

        // Act
        $positiveOperation = $positiveInstruction->operation();
        $positiveArgument = $positiveInstruction->argument();

        $negativeOperation = $negativeInstruction->operation();
        $negativeArgument = $negativeInstruction->argument();

        // Assert
        $this->assertEquals('acc', $positiveOperation);
        $this->assertEquals(3, $positiveArgument);

        $this->assertEquals('jmp', $negativeOperation);
        $this->assertEquals(-4, $negativeArgument);
    }
}
