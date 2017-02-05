<?php
/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 23/12/2016
 * Time: 3:58 μμ
 */
session_start();
include "../database/DatabaseConnection.php";
include '../model/login/User.php';

if (isset($_SESSION["login"])) {
    $currentLogin = $_SESSION["login"];
    $loggedUser = unserialize($currentLogin);
    $userId = $loggedUser->getUserId();

    $petType = $_POST["pet_type"];
    $petBreed = $_POST["pet_breed"];
    $petAge = $_POST["pet_age"];
    $advertType = $_POST["advert_type"];
    $advertDetails = $_POST["advert_details"];

    $file = addslashes($_FILES["image"]["tmp_name"]);
    $file = file_get_contents($file);

    /** Initiate Connection */
    $host = "localhost";
    $uname = "root";
    $psswd = null;
    $dbname = "getapet";

    $conn = new mysqli($host, $uname, $psswd, $dbname);


    $query = "INSERT INTO PETS VALUES (?,?,?,?,?,?,?,?,?,?)";

    $statement = $conn->stmt_init();
    if (!$statement->prepare($query)) {
        print "Failed to prepare statement";
    } else {
        $pet_id = null;
        $advert_date = date('Y-m-d H:i:s');
        /** Bind Params into the Prepared Statement */
        $statement->bind_param("iisssisbss", $pet_id, $userId, $petType, $petBreed, $petAge, $advertType, $advertDetails, $file, $advert_date, $advert_date);
        $statement->send_long_data(7, $file);
        $success = $statement->execute();
        echo $statement->error;

        echo $success;
    }

    $statement->close();
    $conn->close();

    $url = "Location: ../index.php";
    header($url);
}

