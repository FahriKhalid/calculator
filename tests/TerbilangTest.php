<?php


use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use Uyab\Calculator\Terbilang;
use PHPUnit\Framework\TestCase;


#[CoversClass(Terbilang::class)]
class TerbilangTest extends TestCase
{
    /**
     * @dataProvider numberProvider
     */
    #[DataProvider('expressionProvider')]
    public function testToString($input, $expected)
    {
        $calculator = new Terbilang($input);
        $this->assertEquals($expected, $calculator->toString());
    }

    public static function expressionProvider(): array
    {
        return [
            [0, ""],                        // Test for zero
            [1, "satu"],                    // Test for single digit
            [11, "sebelas"],                // Test for eleven
            [20, "dua puluh"],              // Test for multiples of ten
            [25, "dua puluh lima"],         // Test for mixed tens
            [100, "seratus"],
            [200, "dua ratus"],               // Test for exactly 100
            [115, "seratus lima belas"],    // Test for numbers in the hundreds
            [1000, "seribu"],               // Test for exactly 1000
            [1015, "seribu lima belas"],    // Test for numbers in the thousands
            [2000, "dua ribu"],             // Test for multiples of a thousand
            [15000, "lima belas ribu"],     // Test for larger numbers
            [1000000, "satu juta"],
            [1000000000, "satu milyar"],      // Test for exactly 1 million
            [1000000000000, "satu trilyun"],
            [-100, "minus seratus"],        // Test for negative numbers
        ];
    }
}
