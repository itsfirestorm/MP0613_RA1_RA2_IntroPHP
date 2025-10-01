<?php

class P17_Orwell
{
    public function main(): void
    {
        // Prompt the user for input
        echo "Give a number: ";

        // Get input from the user
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));

        if ($input == 1984) {
            echo "Orwell";
        }
        // Check if the input is exactly 1984
        // Write your code here
       
    }
}
