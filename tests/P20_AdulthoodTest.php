<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P20_Adulthood.php';

#[CoversClass(P20_Adulthood::class)]
final class P20_AdulthoodTest extends TestCase
{
    #[DataProvider('ageProvider')]
    public function testAdulthoodOutput(string $input, bool $shouldBeAdult): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P20_Adulthood();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString('How old are you?', $output);

        if ($shouldBeAdult) {
            $this->assertStringContainsString('You are an adult', $output, "Expected 'You are an adult' for input '$input'");
            $this->assertStringNotContainsString('You are not an adult', $output, "Did NOT expect 'You are not an adult' for input '$input'");
        } else {
            $this->assertStringContainsString('You are not an adult', $output, "Expected 'You are not an adult' for input '$input'");
            $this->assertStringNotContainsString('You are an adult', $output, "Did NOT expect 'You are an adult' for input '$input'");
        }
    }

    public static function ageProvider(): array
    {
        return [
            ['18', true],
            ['25', true],
            ['17', false],
            ['0', false],
            ['-10', false],
            [' 20 ', true],
            ['notANumber', false],  // (int)"notANumber" == 0
            ['18.5', true],         // (int)"18.5" == 18
            ['17.9', false],        // (int)"17.9" == 17
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
