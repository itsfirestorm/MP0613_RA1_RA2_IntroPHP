<?php

use PHPUnit\Framework\TestCase;
require './exercises/P09_MultiplicationFormula.php';
class P09_MultiplicationFormulaTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "4 x 4 = 16\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P09_MultiplicationFormula and call the main method
        $additionFormula = new P09_MultiplicationFormula();
        $additionFormula->main();
    }
}
