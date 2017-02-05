<?php

/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 5/2/2016
 * Time: 12:21 μμ
 */

include "../model/login/User.php";
include '../database/DatabaseConnection.php';

session_start();
error_reporting(E_ALL);

if (isset($_SESSION["login"])) {
    $user = $_SESSION["login"];
    $userLogin = unserialize($user);

    $sender = $userLogin->getUserId();
    $receiver = $_POST["receiver_id"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];

    $conn = DatabaseConnection::getInstance();

    if ($conn->connect_error) {
        die("$conn->connect_errno: $conn->connect_error");
    }

    $query = "INSERT INTO messages VALUES (?,?,?,?,?)";

    $statement = $conn->stmt_init();
    if (!$statement->prepare($query)) {
        echo "Try again later";
    } else {
        $sent = date('Y-m-d H:i:s');
        $statement->bind_param("iisss", $sender, $receiver, $subject, $body, $sent);
        $success = $statement->execute();
    }

    $statement->close();
    $conn->close();

    if ($success) {
        $url = "Location: ../index.php";
        header($url);
    } else {

    }
}


