<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P23_AbsoluteValue.php';

#[CoversClass(P23_AbsoluteValue::class)]
final class P23_AbsoluteValueTest extends TestCase
{
    #[DataProvider('valueProvider')]
    public function testAbsoluteValue(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P23_AbsoluteValue();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertEquals($expectedOutput . "\n", $output);
    }

    public static function valueProvider(): array
    {
        return [
            ['0', '0'],
            ['5', '5'],
            ['-3', '3'],
            ['-100', '100'],
            ['42', '42'],
            ['-999', '999'],
            ['-2 ', '2'],
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
