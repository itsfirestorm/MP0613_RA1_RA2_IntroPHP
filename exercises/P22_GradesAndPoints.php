<?php

class P22_GradesAndPoints
{
    public function main(): void
    {
        // Write your code here
        echo "Give points";
        $input = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        switch ((int)$input) {
            case $input <= 0:
                echo "impossible!";
                break;
            case $input > 0 && $input < 50:
                echo "failed";
                break;
            case $input >= 50 && $input < 60:
                echo "1";
                break;
            case $input >= 60 && $input < 70:
                echo "2";
                break;
            case $input >= 70 && $input < 80:
                echo "3";
                break;
            case $input >= 80 && $input < 90:
                echo "4";
                break;
            case $input >= 90 && $input <= 100:
                echo "5";
                break;
            default:
                echo "incredible!";
                break;
        }
    }
}
