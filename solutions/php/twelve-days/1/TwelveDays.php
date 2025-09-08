<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class TwelveDays
{
    public function recite(int $start, int $end): string
    {
        
        $days = [
            'first', 'second', 'third', 'fourth', 'fifth', 'sixth',
            'seventh', 'eighth', 'ninth', 'tenth', 'eleventh', 'twelfth'
        ];

        $gifts = [
            'a Partridge in a Pear Tree.',
            'two Turtle Doves',
            'three French Hens',
            'four Calling Birds',
            'five Gold Rings',
            'six Geese-a-Laying',
            'seven Swans-a-Swimming',
            'eight Maids-a-Milking',
            'nine Ladies Dancing',
            'ten Lords-a-Leaping',
            'eleven Pipers Piping',
            'twelve Drummers Drumming'
        ];

        $verses = [];

        for ($i = $start - 1; $i < $end; $i++) {
            $line = "On the {$days[$i]} day of Christmas my true love gave to me: ";

            $todayGifts = [];
            for ($j = $i; $j >= 0; $j--) {
                if ($j === 0 && $i > 0) {
                    $todayGifts[] = 'and ' . $gifts[$j];
                } else {
                    $todayGifts[] = $gifts[$j];
                }
            }

            $line .= implode(', ', $todayGifts);
            $verses[] = $line;
        }

       return implode(PHP_EOL, $verses);
    }
    
}
