<?php

namespace Uyab\Calculator;

use InvalidArgumentException;

class OperationFactory
{
    private array $operations;

    public function __construct()
    {
        $this->operations = [
            '+' => new AddCalculation(),
            '-' => new SubtractCalculation(),
            '*' => new MultiplyCalculation(),
            '/' => new DivideCalculation(),
        ];
    }

    public function getOperation(string $operator): OperationInterface
    {
        if (!isset($this->operations[$operator])) {
            throw new InvalidArgumentException("Invalid expression format");
        }
        return $this->operations[$operator];
    }
}
