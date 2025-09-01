<?php

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        $list1 = (int) implode('', $digitsOfNumber1);
        $list2 = (int) implode('', $digitsOfNumber2);
        $total=$list1 + $list2;
        return $total;
    }

    public function isPalindrome(int $number): bool
    {
       
        if ($number < 0) {
            return false;
        }

        
        $str = (string)$number;
        return $str === strrev($str);
    
    }

    public function validate(string $input): string
    {
        $input = trim($input);
        
        if ($input === '') {
            return 'Required field';
        }
        
        $number = (int)$input;
        
        if ($number <= 0) {
        return 'Must be a whole number larger than 0';
        }

        return '';
    
    }
}
