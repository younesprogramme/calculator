<?php

namespace App\Services\Calculator;

class Subtraction implements OperationInterface 
{
    public function calculate(float $a, float $b): float 
    {
        return $a - $b;
    }
}