<?php

namespace Uyab\Calculator;


class BasicCalculator
{

    public function add($a, $b)
    {
        return AddCalculation::calculate($a, $b);
    }

    public function subtract($a, $b)
    {
        return SubtractCalculation::calculate($a, $b);
    }

    public function multiply($a, $b)
    {
        return MultiplyCalculation::calculate($a, $b);
    }

    public function divide($a, $b)
    {
        return DivideCalculation::calculate($a, $b);
    }
}
