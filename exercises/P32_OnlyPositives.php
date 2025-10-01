<?php

class P32_OnlyPositives
{
    public function main(): void
    {
        // Write your code here
        while (true) {
            echo "Give a number:";
            $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
            if ($input == 0) {
                break;
            }
            if ($input < 0) {
                echo "Unsuitable number";
            } else {
                echo $input * $input;
            }
        }
    }
}
