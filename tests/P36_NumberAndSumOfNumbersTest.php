<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P36_NumberAndSumOfNumbers.php';

#[CoversClass(P36_NumberAndSumOfNumbers::class)]
final class P36_NumberAndSumOfNumbersTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testCounts(array $inputs, string $expectedCount, string $expectedSum): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P36_NumberAndSumOfNumbers();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedCount, $output);
        $this->assertStringContainsString($expectedSum, $output);
    }

    public static function inputProvider(): array
    {
        return [
            [['0'], 'Number of numbers: 0', 'Sum of the numbers: 0'],
            [['4', '0'], 'Number of numbers: 1', 'Sum of the numbers: 4'],
            [['1', '2', '3', '0'], 'Number of numbers: 3', 'Sum of the numbers: 6'],
            [['-1', '-2', '0'], 'Number of numbers: 2', 'Sum of the numbers: -3'],
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
