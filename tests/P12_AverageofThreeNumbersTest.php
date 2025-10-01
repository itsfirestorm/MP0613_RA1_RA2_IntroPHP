<?php

use PHPUnit\Framework\TestCase;
require './exercises/P12_AverageOfThreeNumbers.php';
class P12_AverageofThreeNumbersTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "The average is 10.666666666667\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P12_AverageOfThreeNumbers and call the main method
        $additionFormula = new P12_AverageOfThreeNumbers();
        $additionFormula->main();
    }
}
