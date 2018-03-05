<?php

class Helpers
{
    /**
     * Generate random charasters from given range
     *
     * @param  int $characters
     * @return string $code
    */
    public static function generateCode($characters)
    {
        // List all possible characters, similar looking characters and vowels have been removed
        $possible = '23456789bcdfghjkmnpqrstvwxyz';
        $code     = '';

        $i = 0;
        while ($i < $characters) {
            $code .= substr($possible, mt_rand(0, strlen($possible) - 1), 1);
            $i ++;
        }

        return $code;
    }
}