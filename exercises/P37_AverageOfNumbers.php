<?php

class P37_AverageOfNumbers
{
    public function main(): void
    {
        // Write your code here
        $sum = 0;
        $i = 0;
        for ($i; $i < $i + 1; $i++) {
            echo "Give a number:";
            $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
            if ($input == 0) {
                break;
            }
            $sum = $sum + $input;
        }
        if ($i != 0) {
            echo "Average of the numbers: " . $sum / $i;
        } else {
            echo "Average of the numbers: " . $sum;
        }
    }
}
