<?php

namespace Uyab\Calculator;

class AddCalculation implements OperationInterface
{
    public static function calculate($a, $b): int|string
    {
        return $a + $b;
    }
}
