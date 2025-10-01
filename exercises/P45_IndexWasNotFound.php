<?php

class P45_IndexWasNotFound
{
    public function main(): void
    {

        $array = [6, 2, 8, 1, 3, 0, 9, 7];

        // Write your code here
        echo "Search for?";
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        if (array_search($input, $array) != null) {
            echo $input . " is at index " . array_search($input, $array) . ".";
        } else {
            echo $input . " was not found.";
        }
    }
}
