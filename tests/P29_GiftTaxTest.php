<?php

declare(strict_types=1);

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

require_once './exercises/P29_GiftTax.php';

#[CoversClass(P29_GiftTax::class)]
final class P29_GiftTaxTest extends TestCase
{
    #[DataProvider('valueProvider')]
    public function testGiftTax(string $input, string $expected): void
    {
        $stdin = fopen('php://memory', 'r+');
        fwrite($stdin, $input . "\n");
        rewind($stdin);

        $this->mockStdin($stdin);

        ob_start();
        $program = new P29_GiftTax();
        $program->main();
        $output = ob_get_clean();

        fclose($stdin);

        $this->assertStringContainsString("Value of the gift?", $output);
        $this->assertStringContainsString($expected, $output);
    }

    public static function valueProvider(): array
    {
        return [
            ['3000', "No tax!"],
            ['5000', "Tax: 100"],
            ['10000', "Tax: 500"],         // 100 + (10000-5000)*0.08 = 100 + 400 = 500
            ['25000', "Tax: 1700"],        // upper limit for 2nd bracket
            ['30000', "Tax: 2200"],        // 1700 + (30000-25000)*0.10 = 1700 + 500 = 2200
            ['55000', "Tax: 4700"],        // upper limit for 3rd bracket
            ['60000', "Tax: 5300"],        // 4700 + (60000-55000)*0.12 = 4700 + 600 = 5300
            ['200000', "Tax: 22100"],      // upper limit for 4th bracket
            ['250000', "Tax: 29600"],      // 22100 + (250000-200000)*0.15 = 22100 + 7500 = 29600
            ['1000000', "Tax: 142100"],    // upper limit for 5th bracket
            ['1500000', "Tax: 227100"],    // 142100 + (1500000-1000000)*0.17 = 142100 + 85000 = 227600
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
