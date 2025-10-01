<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P30_CarryOn.php';

#[CoversClass(P30_CarryOn::class)]
final class P30_CarryOnTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testCarryOnOutput(array $inputs, int $expectedPromptCount): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P30_CarryOn();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        // Verificamos que la cantidad de "Carry on?" mostradas coincida con lo esperado
        $this->assertEquals($expectedPromptCount, substr_count($output, "Shall we carry on?"));
    }

    public static function inputProvider(): array
    {
        return [
            [['no'], 1],
            [['yes', 'no'], 2],
            [['maybe', 'yes', 'no'], 3],
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
