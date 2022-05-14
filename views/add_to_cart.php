<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/controllers/user_controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/controllers/cart_controller.php");
    $userController = new UserController();
    if ($userController->checkLoggedIn())
    {
        $cartController = new CartController();
        $cartController->addProductToCart($_GET["productid"]);
    }
    else
    {
        header("Location: user_invoke.php");
        exit();
    }
?>