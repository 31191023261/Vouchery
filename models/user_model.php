<?php

require_once($_SERVER['DOCUMENT_ROOT']."/models/user.php");
require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

class UserModel
{
    /*---------------------------------Logout---------------------------------*/


    public function signup()
    {
        if ($this->emptyInputSignup() == false) {
            header("Location: index.php?msg=loginemptyinput");
            exit();
        }
        if ($this->passwordMatch() == false) {
            header("Location: index.php?msg=loginpasswordnotmatch");
            exit();
        }
        if ($this->userTaken() == false) {
            header("Location: index.php?msg=loginusertaken");
            exit();
        }
        if ($this->setUser() == false) {
            header("Location: index.php?msg=loginfail");
            exit();
        } else {
            header("Location: index.php?msg=loginsuccess");
            exit();
        }
    }

    private function emptyInputSignup()
    {
        $result = null;
        if (empty($_POST['user_phone']) || empty($_POST['user_password']) || empty($_POST['repeat_password']) || empty($_POST['user_name']) || empty($_POST['user_address'])) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch()
    {
        $result = null;
        if ($_POST['user_password'] === $_POST['repeat_password']) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    private function userTaken()
    {
        $checkUserPhone = $_POST['user_phone'];
        $link = null;
        taoKetNoi($link);

        $query = "SELECT * FROM tbl_user WHERE `user_phone` = '$checkUserPhone'";
        $result = chayTruyVanTraVeDL($link, $query);
        $usertaken = null;
        if (mysqli_num_rows($result) == 0) {
            $usertaken = true;
        } else {
            $usertaken = false;
        }

        giaiPhongBoNho($link, $result);
        return $usertaken;
    }

    private function setUser()
    {

        $result = null;

        $user_phone = $_POST['user_phone'];
        $user_password = $_POST['user_password'];
        $user_name = $_POST['user_name'];
        $user_address = $_POST['user_address'];

        $link = null;
        taoKetNoi($link);

        $query = "INSERT INTO `tbl_user` (`user_phone`, `user_password`, `user_name`, `user_address`) VALUES ( '$user_phone', '$user_password', '$user_name', '$user_address')";
        $setuser = chayTruyVanKhongTraVeDL($link, $query);
        if ($setuser) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /*---------------------------------Login---------------------------------*/


    public function login()
    {
        if ($this->emptyInputLogin() == false) {
            header("Location: login.php?msg=loginemptyinput");
            exit();
        } else if ($this->userNotFound() == false) {
            header("Location: login.php?msg=loginusernotfound");
            exit();
        } else if ($this->getUser() == false) {
            header("Location: login.php?msg=loginfail");
            exit();
        } else {
            header("Location: index.php?msg=loginsuccess");
            exit();
        }
    }

    private function emptyInputLogin()
    {
        $result = null;
        if (empty($_POST['user_phone']) || empty($_POST['user_password'])) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function userNotFound()
    {
        $checkuser = null;

        $userphone = $_POST['user_phone'];
        $userpassword = $_POST['user_password'];

        $link = null;
        taoKetNoi($link);

        $query = "SELECT * FROM tbl_user WHERE `user_phone` = '$userphone' AND `user_password` = '$userpassword'";
        $result = chayTruyVanTraVeDL($link, $query);

        if (mysqli_num_rows($result) == 0) {
            $checkuser = false;
        } else {
            $checkuser = true;
        }
        giaiPhongBoNho($link, $result);
        return $checkuser;
    }

    private function getUser()
    {
        $getuser = null;

        $user_phone = $_POST['user_phone'];
        $user_password = $_POST['user_password'];

        $link = null;
        taoKetNoi($link);

        $query = "SELECT * FROM tbl_user WHERE `user_phone` = '$user_phone' AND `user_password` = '$user_password'";
        $result = chayTruyVanTraVeDL($link, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_phone'] = $row['user_phone'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_address'] = $row['user_address'];
                $getuser = true;
            }
        } else {
            $getuser = false;
        }
        giaiPhongBoNho($link, $result);
        return $getuser;
    }


    /*---------------------------------Update---------------------------------*/


    public function updateUserInfo()
    {
        if ($this->emptyInputUpdate() == false) {
            header("Location: index.php?msg=updateemptyinput");
            exit();
        } else if ($this->setNewInfo() == false) {
            header("Location: index.php?msg=updatefail");
            exit();
        } else {
            header("Location: index.php?msg=updatesuccess");
            exit();
        }
    }

    private function emptyInputUpdate()
    {
        $result = null;
        if (empty($_POST['user_name']) || empty($_POST['user_address'])) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function setNewInfo()
    {
        $userid = $_SESSION['user_id'];
        $newname = $_POST['user_name'];
        $newaddress = $_POST['user_address'];

        $link = null;
        taoKetNoi($link);

        $query = "UPDATE tbl_user SET user_name = '$newname', user_address = '$newaddress' WHERE user_id = $userid";
        $result = chayTruyVanKhongTraVeDL($link, $query);

        if ($result) {
            $_SESSION['user_name'] = $newname;
            $_SESSION['user_address'] = $newaddress;
            return true;
        } else {
            return false;
        }
    }


    /*---------------------------------Logout---------------------------------*/


    public function logout()
    {
        session_destroy();
        header("Location: index.php?msg=logoutsuccess");
    }
}
