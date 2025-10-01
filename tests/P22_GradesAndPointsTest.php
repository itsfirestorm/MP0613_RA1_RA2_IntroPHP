<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P22_GradesAndPoints.php';

#[CoversClass(P22_GradesAndPoints::class)]
final class P22_GradesAndPointsTest extends TestCase
{
    #[DataProvider('gradeProvider')]
    public function testGradeOutput(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P22_GradesAndPoints();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("Give points", $output);
        $this->assertStringContainsString($expectedOutput, $output, "Unexpected output for input '$input'");
    }

    public static function gradeProvider(): array
    {
        return [
            ['-1', 'impossible!'],
            ['0', 'failed'],
            ['49', 'failed'],
            ['50', '1'],
            ['59', '1'],
            ['60', '2'],
            ['69', '2'],
            ['70', '3'],
            ['79', '3'],
            ['80', '4'],
            ['89', '4'],
            ['90', '5'],
            ['100', '5'],
            ['101', 'incredible!'],
            ['999', 'incredible!'],
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
