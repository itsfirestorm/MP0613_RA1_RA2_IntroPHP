<?php

class P38_AverageOfPositiveNumbers
{
    public function main(): void
    {
        // Write your program here
        $sum = 0;
        $i = 0;
        while (true) {
            echo "Give a number:";
            $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
            if ($input == 0) {
                break;
            }
            if ($input > 0) {
                $sum = $sum + $input;
                $i++;
            }
        }
        if ($sum == 0) {
            echo "Cannot calculate the average";
        } else if ($i != 0) {
            echo "Average of the numbers: " . $sum / $i;
        } else {
            echo "Average of the numbers: " . $sum;
        }
    }
}
