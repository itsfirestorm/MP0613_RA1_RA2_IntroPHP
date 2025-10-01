<?php

use PHPUnit\Framework\TestCase;
require './exercises/P11_AverageOfTwoNumbers.php';
class P11_AverageOfTwoNumbersTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "The average is 17.5\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P11_AverageOfTwoNumbers and call the main method
        $additionFormula = new P11_AverageOfTwoNumbers();
        $additionFormula->main();
    }
}
