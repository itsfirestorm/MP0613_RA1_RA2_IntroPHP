<?php

use PHPUnit\Framework\TestCase;
require './exercises/P06_SumOfTwoNumbers.php';
class P06_SumOfTwoNumbersTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "The sum of the numbers is 300\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P16_SumOfTwoNumbers and call the main method
        $sumOfTwoNumbers = new P06_SumOfTwoNumbers();
        $sumOfTwoNumbers->main();
    }
}
