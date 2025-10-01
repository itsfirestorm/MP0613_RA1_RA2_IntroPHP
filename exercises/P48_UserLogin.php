<?php
session_start();

class P48_UserLogin
{
    public function main(): void
    {
        // Write your code here
        $_SESSION["loggedin"] = false;

        $username = $_POST["username"] ?? '';
        $password = $_POST["password"] ?? '';

        if ($username !== "admin" && $password !== "secret") {
            echo "Invalid credentials";
        } else {
            echo "Welcome, admin";
            $_SESSION["loggedin"] = true;
        }
    }
}
