<?php

use PHPUnit\Framework\TestCase;
require './exercises/P14_Squared.php';
class P14_SquaredTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "The area of the square is 16\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P14_Squared and call the main method
        $squared = new P14_Squared();
        $squared->main();
    }
}
