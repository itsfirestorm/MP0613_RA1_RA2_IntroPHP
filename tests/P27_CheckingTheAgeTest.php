<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P27_CheckingTheAge.php';

#[CoversClass(P27_CheckingTheAge::class)]
final class P27_CheckingTheAgeTest extends TestCase
{
    #[DataProvider('ageProvider')]
    public function testAgeOutput(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P27_CheckingTheAge();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("How old are you?", $output);
        $this->assertStringContainsString($expectedOutput, $output, "Unexpected result for input '$input'");
    }

    public static function ageProvider(): array
    {
        return [
            ['25', 'Ok'],
            ['0', 'Ok'],
            ['120', 'Ok'],
            ['-1', 'Impossible!'],
            ['121', 'Impossible!'],
            ['200', 'Impossible!'],
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
