<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P21_LargerThanOrEqualTo.php';

#[CoversClass(P21_LargerThanOrEqualTo::class)]
final class P21_LargerThanOrEqualToTest extends TestCase
{
    #[DataProvider('numberPairsProvider')]
    public function testGreaterOrEqualOutput(string $input1, string $input2, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input1 . "\n" . $input2 . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P21_LargerThanOrEqualTo();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString('Give the first number:', $output);
        $this->assertStringContainsString('Give the second number:', $output);
        $this->assertStringContainsString($expectedOutput, $output, "Unexpected output for input '$input1' and '$input2'");
    }

    public static function numberPairsProvider(): array
    {
        return [
            ['5', '3', 'Greater number is: 5'],
            ['2', '10', 'Greater number is: 10'],
            ['7', '7', 'The numbers are equal!'],
            ['-1', '-5', 'Greater number is: -1'],
            ['-3', '2', 'Greater number is: 2'],
            ['100', '100', 'The numbers are equal!'],
            [' 8 ', '6', 'Greater number is: 8'],
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
