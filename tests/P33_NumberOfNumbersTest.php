<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P33_NumberOfNumbers.php';

#[CoversClass(P33_NumberOfNumbers::class)]
final class P33_NumberOfNumbersTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testNumberOfNumbers(array $inputs, string $expectedFinalLine): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P33_NumberOfNumbers();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedFinalLine, $output);
    }

    public static function inputProvider(): array
    {
        return [
            [['0'], "Number of numbers: 0"],
            [['5', '4', '3', '2', '1', '0'], "Number of numbers: 5"],
            [['-1', '-2', '0'], "Number of numbers: 2"]
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
