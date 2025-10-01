<?php

use PHPUnit\Framework\TestCase;
require './exercises/P13_SimpleCalculator.php';

class P13_SimpleCalculatorTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "8 + 2 = 10\n" .
                          "8 - 2 = 6\n" .
                          "8 * 2 = 16\n" .
                          "8 / 2 = 4\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P13_SimpleCalculator and call the main method
        $calculator = new P13_SimpleCalculator();
        $calculator->main();
    }
}
