<?php

namespace Uyab\Calculator;

class DivideCalculation implements OperationInterface
{
    public static function calculate($a, $b): int|string
    {
        if ($b === 0) {
            return 'Infinity';
        }

        return $a / $b;
    }
}
