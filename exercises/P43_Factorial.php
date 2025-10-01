<?php

class P43_Factorial
{
    public function main(): void
    {
        // Write your program here
        echo "Give a number:";
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        $sum = 1;
        for ($i = 1; $i <= $input; $i++) {
            $sum *= $i;
        }
        echo "Factorial: " . $sum;
    }
}
