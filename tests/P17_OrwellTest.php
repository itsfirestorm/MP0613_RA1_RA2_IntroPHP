<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P17_Orwell.php';

class P17_OrwellTest extends TestCase
{
    #[DataProvider('inputProvider')]
    public function testMain($input, $expectsOrwell)
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P17_Orwell();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("Give a number", $output);

        if ($expectsOrwell) {
            $this->assertStringContainsString("Orwell", $output, "Expected 'Orwell' in output for input: $input");
        } else {
            $this->assertStringNotContainsString("Orwell", $output, "Did not expect 'Orwell' in output for input: $input");
        }
    }

    public static function inputProvider(): array
    {
        return [
            ['1984', true],
            ['1983', false],
            ['1985', false],
            ['notANumber', false],
            [' 1984 ', true], // With whitespace
        ];
    }

    private function mockStdin($stream): void
{
    global $STDIN;
    if (isset($GLOBALS['STDIN']) && $GLOBALS['STDIN'] !== STDIN && is_resource($GLOBALS['STDIN'])) {
        fclose($GLOBALS['STDIN']);
    }
    $GLOBALS['STDIN'] = $stream;
}

}
