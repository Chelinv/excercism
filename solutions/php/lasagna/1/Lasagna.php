<?php

class Lasagna
{
    public function expectedCookTime()
    {
        // Implement the expectedCookTime method
        $min = 40;
        return $min;
    }

    public function remainingCookTime($elapsed_minutes)
    {
        $min=40;
        $total=$min-$elapsed_minutes;
        return $total;
    }

    public function totalPreparationTime($layers_to_prep)
    {
        $min =40;
        $total= 2*$layers_to_prep;
        return $total;
    }

    public function totalElapsedTime($layers_to_prep, $elapsed_minutes)
    {
        $total = (2*$layers_to_prep)+$elapsed_minutes;
        return $total;
    }

    public function alarm()
    {
        return "Ding!";
    }
}
