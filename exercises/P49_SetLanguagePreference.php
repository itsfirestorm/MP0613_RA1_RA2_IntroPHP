<?php
session_start();

class P49_SetLanguagePreference
{
    private array $allowedLanguages = ['en', 'es', 'fr', 'de'];

    public function main(): void
    {
        // Write your code here
        $lang_chosen = $_GET["lang"] ?? '';

        if (in_array($lang_chosen, $this->allowedLanguages, true)) {
            $_SESSION["lang"] = $lang_chosen;
        } else {
            $_SESSION["lang"] = "en";
        }

        echo "Language set to {$_SESSION["lang"]}";
    }
}
