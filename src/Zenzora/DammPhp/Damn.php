<?php

/**
 * Class Damn
 * Based off wikipedia page https://en.wikipedia.org/wiki/Damm_algorithm
 */
class Damn
{
    private static $op_table = [
        [0, 3, 1, 7, 5, 9, 8, 6, 4, 2],
        [7, 0, 9, 2, 1, 5, 4, 8, 6, 3],
        [4, 2, 0, 6, 8, 7, 1, 3, 5, 9],
        [1, 7, 5, 0, 9, 8, 3, 4, 2, 6],
        [6, 1, 2, 3, 0, 4, 5, 9, 7, 8],
        [3, 6, 7, 4, 2, 0, 9, 5, 8, 1],
        [5, 8, 6, 9, 7, 2, 0, 1, 3, 4],
        [8, 9, 4, 5, 3, 6, 2, 0, 1, 7],
        [9, 4, 3, 8, 6, 1, 7, 2, 0, 5],
        [2, 5, 8, 1, 4, 3, 6, 7, 9, 0],
    ];

    public static function calculateCheckDigit($input)
    {
        if (!preg_match('/^\d+$/', $input)) {
            return false;
        }
        $exploded_input = explode($input);
        $interim_digit = 0;
        foreach ($exploded_input as $column_index) {
            $interim_digit = self::$op_table[$interim_digit][$column_index];
        }
        return $interim_digit;
    }

    public static function validate($input)
    {
        return self::calculateCheckDigit($input) === 0;
    }
}