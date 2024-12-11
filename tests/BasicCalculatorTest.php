<?php

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversTrait;
use Uyab\Calculator\BasicCalculator;
use PHPUnit\Framework\TestCase;
use Uyab\Calculator\AddCalculation;
use Uyab\Calculator\SubtractCalculation;
use Uyab\Calculator\MultiplyCalculation;
use Uyab\Calculator\DivideCalculation;

#[CoversClass(BasicCalculator::class)]
#[CoversTrait(AddCalculation::class)]
#[CoversTrait(SubtractCalculation::class)]
#[CoversTrait(MultiplyCalculation::class)]
#[CoversTrait(DivideCalculation::class)]
class BasicCalculatorTest extends TestCase
{
    public function testAdd(): void
    {
        $calculator = new BasicCalculator();
        $result = $calculator->add(1, 2);
        $this->assertEquals(3, $result);
    }

    public function testSubtract(): void
    {
        $calculator = new BasicCalculator();
        $result = $calculator->subtract(2, 1);
        $this->assertEquals(1, $result);
    }

    public function testMultiply(): void
    {
        $calculator = new BasicCalculator();
        $result = $calculator->multiply(2, 3);
        $this->assertEquals(6, $result);
    }

    public function testDivide(): void
    {
        $calculator = new BasicCalculator();
        $result = $calculator->divide(6, 3);
        $this->assertEquals(2, $result);
    }

    public function testDivideByZero(): void
    {
        $calculator = new BasicCalculator();
        $result = $calculator->divide(6, 0);
        $this->assertEquals("Infinity", $result);
    }

    // public function testAddAndReturnAsString(): void
    // {
    //     $calculator = new BasicCalculator();
    //     $result = $calculator->addAndReturnAsString(1, 2);
    //     $this->assertEquals("tiga", $result);
    // }
}
