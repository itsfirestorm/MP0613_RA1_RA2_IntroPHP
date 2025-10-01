<?php

use PHPUnit\Framework\TestCase;
require  './exercises/P02_AdaLovelace.php';
// locate in project folder C:\xampp\htdocs\M07_UF1_PHP1> 
// execute ./vendor/bin/phpunit ./tests/P02_AdaLoveLaceTest.php in terminal to verify the php unit
class P02_AdaLoveLaceTest extends TestCase {
    public function testMain() {
        // Start output buffering
        $this->expectOutputString('Ada Lovelace');

        $adaLovelace = new P02_AdaLoveLace();
        $adaLovelace->main();
        
        // No need for assertion as expectOutputString checks the output
    }
}
