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
    $petType = $_GET["pet_type"];
    $petBreed = $_GET["pet_breed"];
    $petAge = $_GET["pet_age"];
    $advertType = $_GET["advert_type"];
    $advertDetails = $_GET["advert_details"];
//TODO ADD PET PHOTO

    $conn = DatabaseConnection::getInstance();

    $query = "INSERT INTO PETS VALUES (?,?,?,?,?,?,?)";

    $statement = $conn->stmt_init();
    if (!$statement->prepare($query)) {
        print "Failed to prepare statement";
    } else {

        $pet_id = null;
        //TODO ADD PET PHOTO
        $pet_photo = null;
        $advert_date = date('Y-m-d H:i:s');
        //TODO ADD USER_ID
        $userId = $loggedUser->getUserId();

        /** Bind Params into the Prepared Statement */
        $statement->bind_param("iisssisis", $user_id, $petType, $petBreed, $petAge, $advertType, $advertDetails);
        $statement->execute();
    }

    $statement->close();
    $conn->close();

//    if (!$statement->prepare($query)) {
//        print "Failed to prepare statement";
//    } else {
//
//        /** Bind Params into the Prepared Statement */
//        $statement->bind_param("isssssissbis", self::$userId, $firstName, $lastName, $username, $password, $user_email, $accountType, $address, $telephone, self::$photo, self::$isActive, $emailCode);
//        $success = $statement->execute();
//
//        return $success;
//    }
//
//    $statement->close();
//    $conn->close();


//    $url = "Location: ../index.php";
//    header($url);
}

