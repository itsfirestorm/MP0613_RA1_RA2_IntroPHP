<?php

class P39_Counting
{
    public function main(): void
    {
        // Write your program here
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        for ($i = 0; $i <= $input; $i++) {
            echo $i . "\n";
        }
    }
}
