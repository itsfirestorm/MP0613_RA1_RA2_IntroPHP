<?php

class P23_AbsoluteValue
{
    public function main(): void
    {
        // Write your code here
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        echo abs($input) . "\n";
    }
}
