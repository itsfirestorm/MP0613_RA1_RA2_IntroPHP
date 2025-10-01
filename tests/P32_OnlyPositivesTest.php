<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P32_OnlyPositives.php';

#[CoversClass(P32_OnlyPositives::class)]
final class P32_OnlyPositivesTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testOnlyPositives(array $inputs, array $expectedOutputs): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P32_OnlyPositives();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        foreach ($expectedOutputs as $expected) {
            $this->assertStringContainsString($expected, $output);
        }
    }

    public static function inputProvider(): array
    {
        return [
            [
                ['3', '0'],
                ['Give a number:', '9']
            ],
            [
                ['-2', '5', '0'],
                ['Give a number:', 'Unsuitable number', '25']
            ],
            [
                ['-10', '-1', '0'],
                ['Unsuitable number', 'Unsuitable number']
            ]
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
