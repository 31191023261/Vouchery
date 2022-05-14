<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/controllers/cart_controller.php");
    $cart_controller = new CartController();
    $cart_controller->purchase($_POST["userid"]);
?>