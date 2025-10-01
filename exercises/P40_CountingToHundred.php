<?php

class P40_CountingToHundred
{
    public function main(): void
    {
        // Write your program here
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        for ($i = $input; $i <= 100; $i++) {
            echo $i . "\n";
        }
    }
}
