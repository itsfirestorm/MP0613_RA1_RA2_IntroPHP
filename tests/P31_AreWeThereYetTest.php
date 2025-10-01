<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P31_AreWeThereYet.php';

#[CoversClass(P31_AreWeThereYet::class)]
final class P31_AreWeThereYetTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testLoopUntilFour(array $inputs, int $expectedPrompts): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, implode("\n", $inputs) . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P31_AreWeThereYet();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertEquals($expectedPrompts, substr_count($output, "Give a number:"));
    }

    public static function inputProvider(): array
    {
        return [
            [['4'], 1],
            [['1', '4'], 2],
            [['1', '2', '3', '4'], 4],
            [['0', '999', '4'], 3],
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
