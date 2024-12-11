<?php

namespace Uyab\Calculator;

class SubtractCalculation implements OperationInterface
{
    public static function calculate($a, $b): int|string
    {
        return $a - $b;
    }
}
