<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P34_NumberOfNegativeNumbers.php';

#[CoversClass(P34_NumberOfNegativeNumbers::class)]
final class P34_NumberOfNegativeNumbersTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testNegativeCount(array $inputs, string $expectedFinalLine): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P34_NumberOfNegativeNumbers();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedFinalLine, $output);
    }

    public static function inputProvider(): array
    {
        return [
            [['0'], "Number of negative numbers: 0"],
            [['-1', '-2', '0'], "Number of negative numbers: 2"],
            [['5', '-3', '2', '-1', '0'], "Number of negative numbers: 2"]
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
