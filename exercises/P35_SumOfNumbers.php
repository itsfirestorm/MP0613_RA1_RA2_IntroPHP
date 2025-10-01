<?php

class P35_SumOfNumbers
{
    public function main(): void
    {
        // Write your code here
        $sum = 0;
        while (true) {
            echo "Give a number:";
            $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
            if ($input == 0) {
                break;
            }
            $sum = $sum + $input;
        }
        echo "Sum of the numbers: " . $sum;
    }
}
