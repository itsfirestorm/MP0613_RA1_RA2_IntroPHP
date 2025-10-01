<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P42_SumOfASequence.php';

#[CoversClass(P42_SumOfASequence::class)]
final class P42_SumOfASequenceTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testSum(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P42_SumOfASequence();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedOutput, $output);
    }

    public static function inputProvider(): array
    {
        return [
            ['0', "The sum is 0"],
            ['1', "The sum is 1"],
            ['3', "The sum is 6"],
            ['5', "The sum is 15"],
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
