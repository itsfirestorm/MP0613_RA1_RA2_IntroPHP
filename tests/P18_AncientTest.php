<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P18_Ancient.php';

#[CoversClass(P18_Ancient::class)]
final class P18_AncientTest extends TestCase
{
    #[DataProvider('yearProvider')]
    public function testAncientOutput(string $input, bool $shouldPrintAncient): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P18_Ancient();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString('Give a year', $output);

        if ($shouldPrintAncient) {
            $this->assertStringContainsString('Ancient history!', $output, "Expected 'Ancient history!' for input '$input'");
        } else {
            $this->assertStringNotContainsString('Ancient history!', $output, "Did NOT expect 'Ancient history!' for input '$input'");
        }
    }

    public static function yearProvider(): array
    {
        return [
            ['2014', true],
            ['2015', false],
            ['2020', false],
            ['1900', true],
            [' 2010 ', true],
            ['notAYear', true],  // (int)"notAYear" == 0
            ['2015.0', false],   // cast to 2015
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
