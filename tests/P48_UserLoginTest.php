<?php
use PHPUnit\Framework\TestCase;

require_once './exercises/P48_UserLogin.php';

final class P48_UserLoginTest extends TestCase {
    protected function setUp(): void {
        $_POST = [];
        $_SESSION = [];
    }

    public function testValidLogin(): void {
        $_POST = ['username' => 'admin', 'password' => 'secret'];
        ob_start();
        (new P48_UserLogin())->main();
        $output = ob_get_clean();

        $this->assertEquals("Welcome, admin", $output);
        $this->assertTrue($_SESSION['loggedin']);
    }

    public function testInvalidLogin(): void {
        $_POST = ['username' => 'user', 'password' => 'wrong'];
        ob_start();
        (new P48_UserLogin())->main();
        $output = ob_get_clean();

        $this->assertEquals("Invalid credentials", $output);
        $this->assertFalse($_SESSION['loggedin']);
    }

    public function testEmptyUsernameOrPassword(): void {
        $_POST = ['username' => '', 'password' => ''];
        ob_start();
        (new P48_UserLogin())->main();
        $output = ob_get_clean();

        $this->assertEquals("Invalid credentials", $output);
        $this->assertFalse($_SESSION['loggedin']);
    }
}
