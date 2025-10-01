<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P28_LeapYear.php';

#[CoversClass(P28_LeapYear::class)]
final class P28_LeapYearTest extends TestCase
{
    #[DataProvider('yearProvider')]
    public function testLeapYear(string $input, string $expected): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);
        $this->mockStdin($stdin);

        ob_start();
        $program = new P28_LeapYear();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("Give a year", $output);
        $this->assertStringContainsString($expected, $output);
    }

    public static function yearProvider(): array
    {
        return [
            ['2024', 'The year is a leap year.'],
            ['2020', 'The year is a leap year.'],
            ['1900', 'The year is not a leap year.'],
            ['2000', 'The year is a leap year.'],
            ['2023', 'The year is not a leap year.'],
            ['2100', 'The year is not a leap year.'],
            ['2400', 'The year is a leap year.'],
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
