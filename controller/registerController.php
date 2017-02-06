<?php
/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 18/12/2016
 * Time: 19:03 μμ
 */
session_start();
ob_start();

include "../Model/SendEMail.php";
include "../model/login/UserRegister.php";
include "../database/DatabaseConnection.php";

$username = $_POST["username"];
$password = $_POST["password"];
$userEmail = $_POST["user_email"];
$accountType = $_POST["accountType"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$telephone = $_POST["telephone"];
$address = $_POST["address"];

$file = addslashes($_FILES["image"]["tmp_name"]);
$file = file_get_contents($file);

$userRegister = new UserRegister();
/** Create Verification Code */
$emailCode = md5($username + microtime());

$conn = DatabaseConnection::getInstance();

unset($_SESSION['user_exists']);
unset($_SESSION['email_exists']);

$userExists = $userRegister->checkUserName($username, $conn);
$mailExists = $userRegister->checkMail($userEmail, $conn);
if ($userExists > 0) {
    $_SESSION['user_exists'] = 'Please select another username';
    $url = "Location: ../view/register.php";
    header($url);
    ob_end_flush();
} elseif ($mailExists > 0) {
    $_SESSION['email_exists'] = 'Please select another email';
    $url = "Location: ../view/register.php";
    header($url);
    ob_end_flush();
} else {
    $success = $userRegister->registerUser($username, $password, $userEmail, $accountType, $firstName, $lastName, $telephone, $address, $emailCode, $file, $conn);
    if ($success == 1) {
        $sendMail = new SendEMail($userEmail, $emailCode, $firstName);
        $sendMail->sendMail();
        $url = "Location: ../view/preActivation.php";
        header($url);
        ob_end_flush();
    } else {
        $url = "Location: ../view/register.php";
        header($url);
        ob_end_flush();
    }
}




