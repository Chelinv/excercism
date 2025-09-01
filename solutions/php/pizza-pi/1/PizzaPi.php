<?php

class PizzaPi
{
    public function calculateDoughRequirement(int $pizzas, int $personas): int
    {
        $gram = $pizzas *(($personas * 20)+200);
        return $gram;
        
    }

    public function calculateSauceRequirement(int $pizzas, int $sauce_can_volume): int
    {
        $sauce = 125;
        $cans = ceil(($pizzas * $sauce) / $sauce_can_volume);

        return (int)$cans;
    }

    public function calculateCheeseCubeCoverage(float $cheese_dimension, float $thickness, float $diameter): int
    {
        $pizzas = ($cheese_dimension ** 3) / ($thickness * pi() * $diameter);
        return (int) floor($pizzas);
    }

    public function calculateLeftOverSlices(int $pizzas, int $friends): int
    {
        $pedazos=$pizzas *8 ;
        return $pedazos % $friends; 
    }
}
