<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 18/12/16
 * Time: 9:52 μμ
 */

include '../database/DatabaseConnection.php';

function emailExists($email){

    /** Prepare Insert Query*/
    $query = "SELECT user_id FROM users WHERE email ='$email' LIMIT 1";
    $conn = DatabaseConnection::getInstance();
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return true;
    } else {
        false;
    }
    $conn->close();
}

function activate($email, $emailCode){
    $query = "SELECT user_id FROM users WHERE email ='$email' AND email_code ='$emailCode' AND active = 0";
    $conn = DatabaseConnection::getInstance();
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $query = "UPDATE users SET active = 1 where email ='$email'";
        $result = $conn->query($query);
//        if ($result->num_rows > 0 )
            return true;
    } else {
        false;
    }

    $conn->close();
    return false;

}

function getPets($userId){
    $query = "SELECT * FROM pets WHERE user_id='$userId'";
    $conn = DatabaseConnection::getInstance();
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return $result;
    } else {
        false;
    }
    $conn->close();

    return false;
//    $result = mysqli_query($con, $sqlpet);
}



