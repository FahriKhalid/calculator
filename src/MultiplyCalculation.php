<?php

namespace Uyab\Calculator;

class MultiplyCalculation implements OperationInterface
{
    public static function calculate($a, $b): int|string
    {
        return $a * $b;
    }
}
