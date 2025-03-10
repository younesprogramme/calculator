<?php

namespace App\Services\Calculator;

class Division implements OperationInterface 
{
    public function calculate(float $a, float $b): float 
    {
        if ($b == 0) {
            throw new \InvalidArgumentException("Division par zéro impossible");
        }
        return $a / $b;
    }
}