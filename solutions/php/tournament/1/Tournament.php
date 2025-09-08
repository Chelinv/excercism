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

class Tournament
{
    private array $teams = [];
    public function __construct()
    {
        // Constructor vacío para que los tests funcionen
    }

    public function tally(string $scores): string
{
    $teams = [];

    foreach (explode("\n", trim($scores)) as $line) {
        if (!$line) continue;
        [$team1, $team2, $result] = explode(';', $line);

        foreach ([$team1, $team2] as $team) {
            if (!isset($teams[$team])) {
                $teams[$team] = ['MP'=>0,'W'=>0,'D'=>0,'L'=>0,'P'=>0];
            }
        }

        $teams[$team1]['MP']++;
        $teams[$team2]['MP']++;

        if ($result === 'win') {
            $teams[$team1]['W']++;
            $teams[$team1]['P'] += 3;
            $teams[$team2]['L']++;
        } elseif ($result === 'loss') {
            $teams[$team2]['W']++;
            $teams[$team2]['P'] += 3;
            $teams[$team1]['L']++;
        } elseif ($result === 'draw') {
            $teams[$team1]['D']++;
            $teams[$team2]['D']++;
            $teams[$team1]['P']++;
            $teams[$team2]['P']++;
        }
    }

    // Convert to array of rows
    $rows = [];
    foreach ($teams as $name => $stats) {
        $rows[] = array_merge(['name' => $name], $stats);
    }

    // Sort by points descending, then name ascending
    usort($rows, function($a, $b) {
        if ($a['P'] === $b['P']) {
            return strcmp($a['name'], $b['name']);
        }
        return $b['P'] - $a['P'];
    });

    // Header
    $result = str_pad("Team", 31) . "| MP |  W |  D |  L |  P\n";

    foreach ($rows as $team) {
        $result .= str_pad($team['name'], 31) . "| " .
            str_pad((string)$team['MP'], 2, ' ', STR_PAD_LEFT) . " | " .
            str_pad((string)$team['W'], 2, ' ', STR_PAD_LEFT) . " | " .
            str_pad((string)$team['D'], 2, ' ', STR_PAD_LEFT) . " | " .
            str_pad((string)$team['L'], 2, ' ', STR_PAD_LEFT) . " | " .
            str_pad((string)$team['P'], 2, ' ', STR_PAD_LEFT) . "\n";
    }

    return rtrim($result);
}

}
