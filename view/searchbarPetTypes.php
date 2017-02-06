<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 5/2/17
 * Time: 2:42 μμ
 */

include '../database/DatabaseConnection.php';

$connection = DatabaseConnection::getInstance();

$petType = $_GET['q'];

$result = $connection->query("SELECT DISTINCT pet_type FROM pets WHERE pet_type LIKE '%$petType%'");

$data = array();

while($row=$result->fetch_assoc()){
    $data[] = $row['pet_type'];
}

echo json_encode($data);