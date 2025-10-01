<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P47_ArrayPrinter.php';

#[CoversClass(P47_ArrayPrinter::class)]
final class P47_ArrayPrinterTest extends TestCase
{
    #[DataProvider('arrayProvider')]
    public function testPrintNeatly(array $input, string $expectedOutput): void
    {
        $program = new P47_ArrayPrinter();

        ob_start();
        $program->printNeatly($input);
        $output = ob_get_clean();

        $this->assertSame($expectedOutput, $output);
    }

    public static function arrayProvider(): array
    {
        return [
            [[5, 1, 3, 4, 2], "5, 1, 3, 4, 2\n"],
            [[1], "1\n"],
            [[], "\n"],
            [[10, 20, 30], "10, 20, 30\n"],
        ];
    }
}
