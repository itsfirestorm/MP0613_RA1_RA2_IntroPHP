<?php

class P44_Swap
{
    public function main(): void
    {
        $array = [1, 3, 5, 7, 9];

        // Write your code here

        $where_from = trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        $where_to = trim(fgets($GLOBALS['STDIN'] ?? STDIN));

        $temp = $array[$where_from];
        $array[$where_from] = $array[$where_to];
        $array[$where_to] = $temp;

        foreach ($array as $value) {
            echo "$value\n";
        }
    }
}
