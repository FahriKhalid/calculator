<?php

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Uyab\Calculator\AddCalculation;
use Uyab\Calculator\DivideCalculation;
use Uyab\Calculator\MultiplyCalculation;
use Uyab\Calculator\OperationFactory;
use Uyab\Calculator\SmartCalculator;
use Uyab\Calculator\SubtractCalculation;
use Uyab\Calculator\Terbilang;

#[CoversClass(SmartCalculator::class)]
#[CoversClass(Terbilang::class)]
#[CoversClass(AddCalculation::class)]
#[CoversClass(SubtractCalculation::class)]
#[CoversClass(MultiplyCalculation::class)]
#[CoversClass(DivideCalculation::class)]
#[CoversClass(OperationFactory::class)]
class SmartCalculatorTest extends TestCase
{
    #[DataProvider('expressionProvider')]
    public function testCalculate($expression, $expected): void
    {
        $calculator = new SmartCalculator();
        $this->assertEquals($expected, $calculator->calculate($expression));
    }

    #[DataProvider('terbilangExpressionProvider')]
    public function testCalculateAndDisplayAsTerbilang($expression, $expectedTerbilang): void
    {
        $calculator = new SmartCalculator();
        $this->assertEquals($expectedTerbilang, $calculator->calculateAndDisplayAsTerbilang($expression));
    }

    public function testCalculateWithInvalidExpressionFormatThrowsException(): void
    {
        // Expect InvalidArgumentException to be thrown
        $this->expectException(InvalidArgumentException::class);
        // Expect the message to be "Invalid expression format"
        $this->expectExceptionMessage('Invalid expression format');

        // Instantiate the calculator
        $calculator = new SmartCalculator();
        // Pass an invalid expression format (e.g., unsupported operator)
        $calculator->calculate('2 ^ 3');  // '^' is unsupported, so it should throw an exception
    }

    public static function expressionProvider(): array
    {
        return [
            ['1 + 1', 2],         // Addition
            ['2 - 1', 1],         // Subtraction
            ['3 * 2', 6],         // Multiplication
            ['6 / 2', 3],         // Division
            ['5 / 0', 'Infinity'], // Division by zero
        ];
    }

    public static function terbilangExpressionProvider(): array
    {
        return [
            ['1 + 1', 'dua'],            // 2 in words
            ['2 - 1', 'satu'],           // 1 in words
            ['3 * 2', 'enam'],           // 6 in words
            ['1000 / 1', 'seribu'],      // 1000 in words
            ['1000000 + 0', 'satu juta'], // 1000000 in words
        ];
    }
}
