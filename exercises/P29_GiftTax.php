<?php

class P29_GiftTax
{
    public function main(): void
    {
        // Write your code here
        echo "Value of the gift?";

        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));

        if ($input < 5000) {
            echo "No tax!";
        } elseif ($input <= 25000) {
            echo "Tax: " . (100 + ($input - 5000) * 0.08);
        } elseif ($input <= 55000) {
            echo "Tax: " . (1700 + ($input - 25000) * 0.10);
        } elseif ($input <= 200000) {
            echo "Tax: " . (4700 + ($input - 55000) * 0.12);
        } elseif ($input <= 1000000) {
            echo "Tax: " . (22100 + ($input - 200000) * 0.15);
        } else {
            echo "Tax: " . (142100 + ($input - 1000000) * 0.17);
        }
    }
}
