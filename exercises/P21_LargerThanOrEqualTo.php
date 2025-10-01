<?php

class P21_LargerThanOrEqualTo
{
    public function main(): void
    {
        // Write your code here
        // Prompt the user for input
        echo "Give the first number:";
        // Get input from the user
        $first_input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        // Prompt the user for input
        echo "Give the second number:";
        // Get input from the user
        $second_input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        // Check year value
        if ($first_input > $second_input) {
            echo "Greater number is: " . $first_input;
        } else if ($first_input == $second_input) {
            echo "The numbers are equal!";
        } else {
            echo "Greater number is: " . $second_input;
        }
    }
}
