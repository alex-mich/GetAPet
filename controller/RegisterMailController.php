<?php
require_once '../Model/SendEMail.php';
ob_start();

/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 15/12/16
 * Time: 10:50 πμ
 */

$username = $_POST["username"];
$password = $_POST["password"];
$accountType = $_POST["accountType"];
$realName = $_POST["realName"];
$telephone = $_POST["telephone"];
$address = $_POST["address"];
$userEmail = $_POST["user_email"];

// TODO
// Check if there is a user with that mail. If there is do not register.




// If there is not register the user and send activation email.
$sendMail = new SendEMail($userEmail);
$sendMail->sendMail();
$url = "Location: ../index.php";
header($url);
ob_end_flush();

