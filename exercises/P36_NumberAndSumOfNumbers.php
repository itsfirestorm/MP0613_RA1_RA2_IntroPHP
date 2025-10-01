<?php

class P36_NumberAndSumOfNumbers
{
    public function main(): void
    {
        // Write your code here
        $sum = 0;
        $i = 0;
        for ($i; $i < $i + 1; $i++) {
            echo "Give a number";
            $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
            if ($input == 0) {
                break;
            }
            $sum = $sum + $input;
        }
        echo "Number of numbers: " . $i;
        echo "Sum of the numbers: " . $sum;
    }
}
