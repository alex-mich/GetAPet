<?php
/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 18/12/2016
 * Time: 19:03 μμ
 */

include "../model/login/UserRegister.php";

$username = $_POST["username"];
$password = $_POST["password"];
//TODO HANDLE RE-ENTER PASSWORD
$user_email = $_POST["user_email"];
$accountType = $_POST["accountType"];
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$telephone = $_POST["telephone"];
$address = $_POST["address"];
//TODO HANDLE USER PHOTO

//TODO ADD PHOTO TO METHOD
$userRegister = new UserRegister();
//TODO HANDLE SUCCESS OF FAILURE
$success = $userRegister->registerUser($username, $password, $user_email, $accountType, $firstName, $lastName, $telephone, $address);

$url = "Location: ../view/preActivation.php";
header($url);



