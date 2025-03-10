<?php

namespace App\Services\Calculator;

class Multiplication implements OperationInterface 
{
    public function calculate(float $a, float $b): float 
    {
        return $a * $b;
    }
}