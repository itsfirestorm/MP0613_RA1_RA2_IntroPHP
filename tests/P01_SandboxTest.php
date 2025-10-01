<?php

use PHPUnit\Framework\TestCase;
require  './exercises/P01_Sandbox.php';
// locate in project folder C:\xampp\htdocs\MP0487_PHP1> 
// execute ./vendor/bin/phpunit ./tests/P01_SandboxTest.php in terminal to verify the php unit
class P01_SandboxTest extends TestCase {
    public function testMain() {
        // Expect the output to be "Hello, World!"
        $this->expectOutputString('Hello, World!');

        // Create an instance of the class and run the main method
        $sandbox = new P01_Sandbox();
        $sandbox->main();
        
        // No need for further assertions as expectOutputString handles it
    }
}
