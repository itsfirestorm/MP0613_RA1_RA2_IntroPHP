<?php
session_start();

class P50_AddToCart
{
    public function main(): void
    {
        // Write your code here
        if (isset($_GET['item'])) {
            $_SESSION['cart'][] = $_GET['item'];
        }

        if (!empty($_SESSION["cart"])) {
            echo implode(',', $_SESSION["cart"]);
        }
    }
}
