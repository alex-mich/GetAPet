<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 18/12/16
 * Time: 9:52 μμ
 */

include '../misc/dbConnect.php';

function emailExists($email){

    /** Prepare Insert Query*/
    $query = "SELECT user_id FROM users WHERE email ='$email' LIMIT 1";
    $conn = getConnection();
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
    $conn = getConnection();
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $query = "UPDATE users SET active = 1 where email ='$email'";
        $result = $conn->query($query);
        if ($result->num_rows > 0 )
            return true;
    } else {
        false;
    }

    $conn->close();
    return false;

}

?>