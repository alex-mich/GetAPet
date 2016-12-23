<?php
/**
 * Created by PhpStorm.
 * User: kOrO
 * Date: 23/12/2016
 * Time: 3:58 μμ
 */

include "../database/DatabaseConnection.php";

$petType = $_POST["pet_type"];
$petBreed = $_POST["pet_breed"];
$petAge = $_POST["pet_age"];
$advertType = $_POST["advert_type"];
$advertDetails = $_POST["advert_details"];
//TODO ADD PET PHOTO

$conn = DatabaseConnection::getInstance();

$query = "INSERT INTO PETS VALUES (?,?,?,?,?,?,?,?,?)";

$statement = $conn->stmt_init();
if (!$statement->prepare($query)) {
    print "Failed to prepare statement";
} else {

    $pet_id = null;
    //TODO ADD PET PHOTO
    $pet_photo = null;
    $advert_date = date('Y-m-d H:i:s');
    //TODO ADD USER_ID
    $user_id = 1;

    /** Bind Params into the Prepared Statement */
    $statement->bind_param("iisssbsis", $pet_id, $user_id, $petType, $petBreed, $petAge, $advertType, $advertDetails, $pet_photo, $advert_date);
    $statement->execute();
}

$statement->close();
$conn->close();

$url = "Location: ../index.php";
header($url);

