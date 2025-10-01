<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P41_FromWhereToWhere.php';

#[CoversClass(P41_FromWhereToWhere::class)]
final class P41_FromWhereToWhereTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testFromWhereToWhere(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input);
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P41_FromWhereToWhere();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedOutput, $output);
    }

    public static function inputProvider(): array
    {
        return [
            ["5\n3\n", "3\n4\n5\n"],
            ["3\n3\n", "3\n"],
            ["12\n16\n", ""],   // to < from so no output
            ["0\n0\n", "0\n"],
            ["10\n8\n", "8\n9\n10\n"],
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
