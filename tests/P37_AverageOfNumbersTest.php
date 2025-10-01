<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P37_AverageOfNumbers.php';

#[CoversClass(P37_AverageOfNumbers::class)]
final class P37_AverageOfNumbersTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testAverage(array $inputs, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P37_AverageOfNumbers();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedOutput, $output);
    }

    public static function inputProvider(): array
    {
        return [
            [['0'], "Average of the numbers: 0"],
            [['5', '0'], "Average of the numbers: 5"],
            [['1', '2', '3', '0'], "Average of the numbers: 2"],
            [['-1', '-2', '0'], "Average of the numbers: -1.5"],
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
