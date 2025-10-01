<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P44_Swap.php';

#[CoversClass(P44_Swap::class)]
final class P44_SwapTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testSwap(array $inputLines, array $expectedFinalArray): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputLines) . "\n");
        rewind($stdin);
        $this->mockStdin($stdin);

        ob_start();
        (new P44_Swap())->main();
        $output = ob_get_clean();

        fclose($stdin);

        // Get last output part(final array after swap)
        $parts = explode("\n\n\n", $output);
        $finalOutput = trim(end($parts));
        $finalLines = explode("\n", $finalOutput);

        $this->assertEquals($expectedFinalArray, $finalLines);
    }

    public static function inputProvider(): array
    {
        return [
            // Swap 0 y 1 -> [3, 1, 5, 7, 9]
            [['0', '1'], ['3', '1', '5', '7', '9']],

            // Swap 1 y 4 -> [1, 9, 5, 7, 3]
            [['1', '4'], ['1', '9', '5', '7', '3']],

            // Swap 2 y 2 -> no changes
            [['2', '2'], ['1', '3', '5', '7', '9']],
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
