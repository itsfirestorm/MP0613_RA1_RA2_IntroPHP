<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P39_Counting.php';

#[CoversClass(P39_Counting::class)]
final class P39_CountingTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testCountingOutputsCorrectly(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();

        $program = new P39_Counting();
        $program->main();

        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedOutput, $output);
    }

    public static function inputProvider(): array
    {
        return [
            ['0', "0\n"],
            ['1', "0\n1\n"],
            ['3', "0\n1\n2\n3\n"],
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
