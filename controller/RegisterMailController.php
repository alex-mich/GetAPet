<?php
require_once '../Model/SendEMail.php';

/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 15/12/16
 * Time: 10:50 πμ
 */

$userEmail = $_POST["user_email"];

$sendMail = new SendEMail($userEmail);
$sendMail->sendMail();

