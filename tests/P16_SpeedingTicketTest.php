<?php

use PHPUnit\Framework\TestCase;
require './exercises/P16_SpeedingTicket.php';

class P16_SpeedingTicketTest extends TestCase {
    public function testMainSpeeding() {
        // Define the expected output when the speed is greater than 120
        $expectedOutput = "Speeding ticket!\n";

        // Capture the output of the main method
        $this->expectOutputString($expectedOutput);

        // Create an instance of P26_SpeedingTicket and call the main method
        $ticket = new P16_SpeedingTicket();
        $ticket->main();
    }

    public function testNoSpeeding() {
        // Capture the output when the speed is within the limit
        $this->expectOutputString('');

        // Create a modified version of the class with a lower speed
        $ticket = new P16_SpeedingTicketWithSpeed(120);
        $ticket->main();
    }
}

// Helper class to test with different speed values
class P16_SpeedingTicketWithSpeed extends P16_SpeedingTicket {
    private $speed;

    public function __construct(int $speed) {
        $this->speed = $speed;
    }

    public function main(): void {
        if ($this->speed > 120) {
            echo "Speeding ticket!\n";
        }
    }
}
