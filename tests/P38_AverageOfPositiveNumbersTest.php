<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P38_AverageOfPositiveNumbers.php';

#[CoversClass(P38_AverageOfPositiveNumbers::class)]
final class P38_AverageOfPositiveNumbersTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testAverage(array $inputs, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P38_AverageOfPositiveNumbers();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedOutput, $output);
    }

    public static function inputProvider(): array
    {
        return [
            [['0'], "Cannot calculate the average"],
            [['5', '0'], "5"],
            [['1', '2', '3', '0'], "2"],
            [['-1', '-2', '0'], "Cannot calculate the average"],
            [['-1', '4', '6', '0'], "5"], // average of 4 and 6
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
