<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P19_Positivity.php';

#[CoversClass(P19_Positivity::class)]
final class P19_PositivityTest extends TestCase
{
    #[DataProvider('numberProvider')]
    public function testPositivityOutput(string $input, bool $shouldBePositive): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P19_Positivity();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString('Give a number', $output);

        if ($shouldBePositive) {
            $this->assertStringContainsString('The number is positive.', $output, "Expected 'The number is positive.' for input '$input'");
        } else {
            $this->assertStringContainsString('The number is not positive.', $output, "Expected 'The number is not positive.' for input '$input'");
        }
    }

    public static function numberProvider(): array
    {
        return [
            ['5', true],
            ['0', false],
            ['-3', false],
            [' 42 ', true],
            ['notANumber', false], // (int)"notANumber" == 0
            ['1.5', true],         // (int)"1.5" == 1
            ['-1.9', false],       // (int)"-1.9" == -1
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
