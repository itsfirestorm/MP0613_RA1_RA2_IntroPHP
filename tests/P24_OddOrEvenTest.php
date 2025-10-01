<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P24_OddOrEven.php';

#[CoversClass(P24_OddOrEven::class)]
final class P24_OddOrEvenTest extends TestCase
{
    #[DataProvider('numberProvider')]
    public function testOddOrEvenOutput(string $input, string $expected): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P24_OddOrEven();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("Give a number:", $output);
        $this->assertStringContainsString($expected, $output, "Unexpected result for input '$input'");
    }

    public static function numberProvider(): array
    {
        return [
            ['2', 'Number is even.'],
            ['0', 'Number is even.'],
            ['-4', 'Number is even.'],
            ['1', 'Number is odd.'],
            ['-1', 'Number is odd.'],
            ['999', 'Number is odd.'],
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
