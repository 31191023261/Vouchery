<?php
require_once($_SERVER['DOCUMENT_ROOT']."/models/user_model.php");

class UserController
{
    private $usermodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
        session_start();
    }

    public function userInvoke()
    {
        if (isset($_SESSION['user_id'])) {
            $this->clickLogout();
            $this->clickUpdate();
            include($_SERVER['DOCUMENT_ROOT']."/views/user_profile.php");
        } else if (isset($_GET['page']) && $_GET['page'] == "signup") {
            $this->clickSignup();
            include($_SERVER['DOCUMENT_ROOT']."/views/signup.php");
        } else if (isset($_GET['page']) && $_GET['page'] == "login") {
            $this->clickLogin();
            include($_SERVER['DOCUMENT_ROOT']."/views/login.php");
        } else {
            $this->clickLogin();
            include($_SERVER['DOCUMENT_ROOT']."/views/login.php");
        }
    }

    public function checkLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    private function clickSignup()
    {
        if (isset($_POST['signup'])) {
            $this->usermodel->signup();
        }
    }

    private function clickLogin()
    {
        if (isset($_POST['login'])) {
            $this->usermodel->login();
        }
    }

    private function clickLogout()
    {
        if (isset($_GET['action']) && $_GET['action'] == "logout")
        {
            $this->usermodel->logout();
        }
    }

    private function clickUpdate()
    {
        if (isset($_POST['update'])) {
            $this->usermodel->updateUserInfo();
        }
    }
}
