<?php

use PHPUnit\Framework\TestCase;
require './exercises/P15_SquareRootOfSum.php';

class P15_SquareRootOfSumTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = sqrt(70 + 11) . "\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P15_SquareRootOfSum and call the main method
        $calculator = new P15_SquareRootOfSum();
        $calculator->main();
    }
}
