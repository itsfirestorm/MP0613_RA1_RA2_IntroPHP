<?php
use PHPUnit\Framework\TestCase;

require_once './exercises/P50_AddToCart.php';

final class P50_AddToCartTest extends TestCase {
    public function testAddItems(): void {
        $_GET = ['item' => 'book'];
        $_SESSION = [];
        ob_start();
        (new P50_AddToCart())->main();
        $first = ob_get_clean();

        $_GET = ['item' => 'pen'];
        ob_start();
        (new P50_AddToCart())->main();
        $second = ob_get_clean();

        $_GET = ['item' => 'backpack'];
        ob_start();
        (new P50_AddToCart())->main();
        $third = ob_get_clean();

        $this->assertStringContainsString('book', $first);
        $this->assertStringContainsString('book,pen', $second);
        $this->assertStringContainsString('book,pen,backpack', $third);
    }
}
