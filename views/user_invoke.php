<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/controllers/user_controller.php");
    $user_controller = new UserController();
    $user_controller->userInvoke();
?>
