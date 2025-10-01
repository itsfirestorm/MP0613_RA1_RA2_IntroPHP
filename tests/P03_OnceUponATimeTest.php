<?php

use PHPUnit\Framework\TestCase;
require './exercises/P03_OnceUponATime.php';
class P03_OnceUponATimeTest extends TestCase {
    public function testMain() {
        // We expect these exact lines of output, including newlines
        $this->expectOutputString("Once upon a time\nthere was\na program\n");

        // Create an instance of the class and call the main method
        $onceUponATime = new P03_OnceUponATime();
        $onceUponATime->main();
    }
}
