<?php

namespace Uyab\Calculator;

use InvalidArgumentException;

class SmartCalculator
{
    private OperationFactory $operationFactory;

    public function __construct(OperationFactory $operationFactory = null)
    {
        $this->operationFactory = $operationFactory ?: new OperationFactory();
    }

    public function calculate(string $expression): int|string
    {
        $parts = $this->parseExpression($expression);

        if (count($parts) !== 3) {
            throw new InvalidArgumentException("Invalid expression format");
        }

        [$firstNumber, $operator, $secondNumber] = $parts;

        $operation = $this->operationFactory->getOperation($operator);

        return $this->performCalculation(
            $operation,
            $this->convertToNumber($firstNumber),
            $this->convertToNumber($secondNumber)
        );
    }

    public function calculateAndDisplayAsTerbilang(string $expression): string
    {
        $result = $this->calculate($expression);
        return (new Terbilang($result))->toString();
    }

    private function parseExpression(string $expression): array
    {
        return preg_split('#([+\-*/])#', $expression, -1, PREG_SPLIT_DELIM_CAPTURE);
    }

    private function convertToNumber(string $value): int
    {
        return (int)trim($value);
    }

    private function performCalculation(OperationInterface $operator, int $firstNumber,  int $secondNumber): int|string
    {
        return $operator->calculate($firstNumber, $secondNumber);
    }
}
