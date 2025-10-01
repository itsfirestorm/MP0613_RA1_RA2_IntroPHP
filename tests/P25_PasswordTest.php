<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P25_Password.php';

#[CoversClass(P25_Password::class)]
final class P25_PasswordTest extends TestCase
{
    #[DataProvider('passwordProvider')]
    public function testPassword(string $input, string $expectedOutput): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P25_Password();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("Password?", $output);
        $this->assertStringContainsString($expectedOutput, $output, "Unexpected result for input '$input'");
    }

    public static function passwordProvider(): array
    {
        return [
            ['Caput Draconis', 'Welcome!'],
            ['caput draconis', 'Off with you!'],
            ['wrongpassword', 'Off with you!'],
            ['', 'Off with you!'],
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
