<?php

use PHPUnit\Framework\TestCase;
require './exercises/P10_DivisionFormula.php';
class P10_DivisionFormulaTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "10 / 4 = 2.5\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P10_DivisionFormula and call the main method
        $additionFormula = new P10_DivisionFormula();
        $additionFormula->main();
    }
}
