<?php

namespace Uyab\Calculator;

interface OperationInterface
{
    public static function calculate($a, $b): int|string;
}
