<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P43_Factorial.php';

#[CoversClass(P43_Factorial::class)]
final class P43_FactorialTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testFactorial(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P43_Factorial();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expectedOutput, $output);
    }

    public static function inputProvider(): array
    {
        return [
            ['0', "Factorial: 1"],
            ['1', "Factorial: 1"],
            ['3', "Factorial: 6"],
            ['5', "Factorial: 120"],
            ['6', "Factorial: 720"],
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
