<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P40_CountingToHundred.php';

#[CoversClass(P40_CountingToHundred::class)]
final class P40_CountingToHundredTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testCountingToHundred(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P40_CountingToHundred();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedOutput, $output);
    }

    public static function inputProvider(): array
    {
        return [
            ['98', "98\n99\n100\n"],
            ['100', "100\n"],
            ['97', "97\n98\n99\n100\n"],
            ['101', ""],  // input greater than 100 should print nothing
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
