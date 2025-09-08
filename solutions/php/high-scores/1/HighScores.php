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

class HighScores
{
    public array $scores;

    public function __construct(array $scores)
    {
        $this->scores = $scores;
    }

    // Último score añadido
    public function latest(): int
    {
        return end($this->scores);
    }

    // Mejor score
    public function personalBest(): int
    {
        return max($this->scores);
    }

    // Top 3 puntuaciones
    public function personalTopThree(): array
    {
        $top = $this->scores;
        rsort($top);
        return array_slice($top, 0, 3);
    }

    // Propiedades mágicas para que los tests accedan como $obj->latest
    public function __get(string $name)
    {
        return match($name) {
            'latest' => $this->latest(),
            'personalBest' => $this->personalBest(),
            'personalTopThree' => $this->personalTopThree(),
            default => null,
        };
    }
}
