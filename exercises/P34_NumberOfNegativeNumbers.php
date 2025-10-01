<?php

class P34_NumberOfNegativeNumbers
{
    public function main(): void
    {
        $i = 0;
        while (true) {
            echo "Give a number:";
            $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
            if ($input < 0) {
                $i++;
            }
            if ($input == 0) {
                break;
            }
        }
        echo "Number of negative numbers: " . $i;
    }
}
