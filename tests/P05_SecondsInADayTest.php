<?php

use PHPUnit\Framework\TestCase;
require './exercises/P05_SecondsInADay.php';
class P05_SecondsInADayTest extends TestCase {
    public function testMain() {
        // Define the expected output
        $expectedOutput = "Seconds in 1 day:\n86400\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P05_SecondsInADay and call the main method
        $secondsInADay = new P05_SecondsInADay();
        $secondsInADay->main();
    }
}
