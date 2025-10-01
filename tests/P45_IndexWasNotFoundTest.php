<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P45_IndexWasNotFound.php';

#[CoversClass(P45_IndexWasNotFound::class)]
final class P45_IndexWasNotFoundTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testSearch(string $input, string $expected): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P45_IndexWasNotFound();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString($expected, $output);
    }

    public static function inputProvider(): array
    {
        return [
            ['3', "3 is at index 4."],
            ['9', "9 is at index 6."],
            ['11', "11 was not found."],
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
