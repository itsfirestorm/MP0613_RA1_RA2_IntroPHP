<?php
use PHPUnit\Framework\TestCase;

require_once './exercises/P49_SetLanguagePreference.php';

final class P49_SetLanguagePreferenceTest extends TestCase {
    protected function setUp(): void {
        $_GET = [];
        $_SESSION = [];
    }

    public function testDefaultLanguage(): void {
        $_GET = [];
        ob_start();
        (new P49_SetLanguagePreference())->main();
        $output = ob_get_clean();

        $this->assertEquals("Language set to en", $output);
        $this->assertEquals('en', $_SESSION['lang']);
    }

    public function testSpanish(): void {
        $_GET = ['lang' => 'es'];
        ob_start();
        (new P49_SetLanguagePreference())->main();
        $output = ob_get_clean();

        $this->assertEquals("Language set to es", $output);
        $this->assertEquals('es', $_SESSION['lang']);
    }

    public function testUnsupportedLanguageDefaultsToEn(): void {
        $_GET = ['lang' => 'jp'];
        ob_start();
        (new P49_SetLanguagePreference())->main();
        $output = ob_get_clean();

        $this->assertEquals("Language set to en", $output);
        $this->assertEquals('en', $_SESSION['lang']);
    }

    public function testFrench(): void {
        $_GET = ['lang' => 'fr'];
        ob_start();
        (new P49_SetLanguagePreference())->main();
        $output = ob_get_clean();

        $this->assertEquals("Language set to fr", $output);
        $this->assertEquals('fr', $_SESSION['lang']);
    }
}
