<?php

use PHPUnit\Framework\TestCase;
require './exercises/P07_SumOfThreeNumbers.php';
class P07_SumOfThreeNumbersTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "The sum of the numbers is 600\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P07_SumOfThreeNumbers and call the main method
        $sumOfThreeNumbers = new P07_SumOfThreeNumbers();
        $sumOfThreeNumbers->main();
    }
}
