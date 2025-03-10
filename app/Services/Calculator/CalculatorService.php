<?php

namespace App\Services\Calculator;

use InvalidArgumentException;

class CalculatorService 
{
    protected $operations = [];

    public function registerOperation(string $operator, OperationInterface $operation)
    {
        $this->operations[$operator] = $operation;
    }

    public function calculate(float $a, float $b, string $operator): float 
    {
        if (!isset($this->operations[$operator])) {
            throw new InvalidArgumentException("Opération non supportée");
        }
        
        return $this->operations[$operator]->calculate($a, $b);
    }
}