<?php

use PHPUnit\Framework\TestCase;
require './exercises/P04_VariousVariables.php';

class P04_VariousVariablesTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "Chicken:\n" .
                          "9000\n" .
                          "Bacon (kg):\n" .
                          "0.1\n" .
                          "Tractor:\n" .
                          "Zetor\n" .
                          "\n" .
                          "And finally, a summary:\n" .
                          "9000\n" .
                          "0.1\n" .
                          "Zetor\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P04_VariousVariables and call the main method
        $variables = new P04_VariousVariables();
        $variables->main();
    }
}
