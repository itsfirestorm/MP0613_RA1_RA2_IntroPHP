<?php

class P41_FromWhereToWhere
{
    public function main(): void
    {
        // Write your program here
        echo "Where to?";
        $where_to = (int) trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        echo "Where from?";
        $where_from = (int) trim(fgets($GLOBALS['STDIN'] ?? STDIN));
        if ($where_to >= $where_from) {
            for ($i = $where_from; $i <= $where_to; $i++) {
                echo $i . "\n";
            }
        }
    }
}
