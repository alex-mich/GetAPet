<?php
/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 18/12/2016
 * Time: 19:03 μμ
 */
ob_start();

include "../model/login/UserRegister.php";
include "../Model/SendEMail.php";

$username = $_POST["username"];
$password = $_POST["password"];
//TODO HANDLE RE-ENTER PASSWORD
$userEmail = $_POST["user_email"];
$accountType = $_POST["accountType"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$telephone = $_POST["telephone"];
$address = $_POST["address"];
//TODO HANDLE USER PHOTO

//TODO ADD PHOTO TO METHOD
$userRegister = new UserRegister();
/** Create Verification Code */
$emailCode = md5($username + microtime());

//TODO HANDLE SUCCESS OF FAILURE
$success = $userRegister->registerUser($username, $password, $userEmail, $accountType, $firstName, $lastName, $telephone, $address, $emailCode);

if ($success == 1){
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





