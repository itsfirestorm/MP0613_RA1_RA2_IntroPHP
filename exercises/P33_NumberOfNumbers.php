<?php

class P33_NumberOfNumbers
{
    public function main(): void
    {
        // Write your code here
        $i = 0;
        for ($i; $i < $i + 1; $i++) {
            echo "Give a number:";
            $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
            if ($input == 0) {
                break;
            }
        }
        echo "Number of numbers: " . $i;
    }
}
