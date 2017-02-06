<?php
/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 17/12/2016
 * Time: 12:32 μμ
 */

include "../model/login/User.php";
include "../model/login/UserLogin.php";
include "../database/DatabaseConnection.php";

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$userLogin = new UserLogin();
$conn = DatabaseConnection::getInstance();
$user = $userLogin->loadUser($username, $conn);

if (isset($_SESSION["login"])) {
    $previousLogin = $_SESSION["login"];
    $currentLogin = unserialize($previousLogin);
}

$currentLogin = $user;
if ($user->getIsActive() == 0) {
    $_SESSION["inactive"] = 'inactive';
    $url = "Location: ../view/login.php";
    header($url);
} else if ($user->getPassword() != $password) {
    unset($_SESSION["inactive"]);
    $_SESSION["wrong_credentials"] = 'wrong';
    $url = "Location: ../view/login.php";
    header($url);
}   else {
    unset($_SESSION["inactive"]);
    unset($_SESSION["wrong_credentials"]);
    $previousLogin = serialize($currentLogin);
    $_SESSION["login"] = $previousLogin;

    $url = "Location: ../view/userProfile.php";
    header($url);
}


