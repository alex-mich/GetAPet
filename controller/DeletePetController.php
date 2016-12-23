<?php
/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 23/12/2016
 * Time: 8:08 μμ
 */

include '../database/DatabaseConnection.php';

$pet_id = $_GET["delete_adv"];

$conn = DatabaseConnection::getInstance();
$petDetailsQuery = "delete from pets WHERE pet_id = (?)";

$statement = $conn->stmt_init();
if (!$statement->prepare($petDetailsQuery)) {
    echo "Try again later";
} else {
    $statement->bind_param("i", $pet_id);
    $statement->execute();
}

$url = "Location: ../view/MyAdverts.php";
header($url);