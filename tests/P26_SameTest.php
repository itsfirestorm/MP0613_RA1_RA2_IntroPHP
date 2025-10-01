<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P26_Same.php';

#[CoversClass(P26_Same::class)]
final class P26_SameTest extends TestCase
{
    #[DataProvider('stringProvider')]
    public function testSameOutput(string $input1, string $input2, string $expected): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input1 . "\n" . $input2 . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P26_Same();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("Enter the first string:", $output);
        $this->assertStringContainsString("Enter the second string:", $output);
        $this->assertStringContainsString($expected, $output, "Unexpected comparison result for inputs '$input1' and '$input2'");
    }

    public static function stringProvider(): array
    {
        return [
            ['hello', 'hello', 'Same'],
            ['Hello', 'hello', 'Different'],
            ['apple', 'apple', 'Same'],
            ['apple', 'banana', 'Different'],
            ['', '', 'Same'],
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
