<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        $name = trim($name);
        $firstLetter = $name[0]; 
        return $firstLetter;
    }

    public function initial(string $name): string
    {
        return strtoupper($this->firstLetter($name) . ".");
    }

    public function initials(string $name): string
    {
        $parts = preg_split('/\s+/', trim($name));

        $first = $this->initial($parts[0]);
        $last  = isset($parts[1]) ? $this->initial($parts[1]) : '';

        return trim($first . ' ' . $last);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {
        $a = $this->initials($sweetheart_a);
        $b = $this->initials($sweetheart_b);

        return <<<HEART
     ******       ******
   **      **   **      **
 **         ** **         **
**            *            **
**                         **
**     $a  +  $b     **
 **                       **
   **                   **
     **               **
       **           **
         **       **
           **   **
             ***
              *
HEART;
    }
}
