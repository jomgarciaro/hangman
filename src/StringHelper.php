<?php

namespace Hangman;

class StringHelper
{
    public static function strSplitUnicode(string $str): array 
    {
        return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    }

    public static function explodeUnique(string $str): array
    {
        $letters = self::strSplitUnicode($str);
        $uniqueLetters = [];
        
        foreach ($letters as $letter) {
            if (!in_array($letter, $uniqueLetters)) {
                $uniqueLetters[] = $letter; 
            }
        }

        return $uniqueLetters;
    }
}