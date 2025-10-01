<?php

class P27_CheckingTheAge
{
    public function main(): void
    {
        // Write your code here
        echo "How old are you?";
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        if ($input > 120 || $input < 0) {
            echo "Impossible!";
        } else {
            echo "Ok";
        }
    }
}
