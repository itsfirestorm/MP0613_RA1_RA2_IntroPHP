<?php

use PHPUnit\Framework\TestCase;
require './exercises/P08_AdditionFormula.php';
class P08_AdditionFormulaTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "2 + 2 = 4\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P08_AdditionFormula and call the main method
        $additionFormula = new P08_AdditionFormula();
        $additionFormula->main();
    }
}
