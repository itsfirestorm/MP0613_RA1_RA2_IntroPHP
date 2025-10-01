<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P35_SumOfNumbers.php';

#[CoversClass(P35_SumOfNumbers::class)]
final class P35_SumOfNumbersTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testSum(array $inputs, string $expectedLine): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P35_SumOfNumbers();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedLine, $output);
    }

    public static function inputProvider(): array
    {
        return [
            [['0'], "Sum of the numbers: 0"],
            [['3', '0'], "Sum of the numbers: 3"],
            [['5', '4', '1', '0'], "Sum of the numbers: 10"],
            [['-2', '-3', '0'], "Sum of the numbers: -5"]
        ];
    }

    private function mockStdin($stream): void
    {
        global $STDIN;
        if (is_resource($STDIN)) {
            fclose($STDIN);
        }
        $GLOBALS['STDIN'] = $stream;
    }
}
