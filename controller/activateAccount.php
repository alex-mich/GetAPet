<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 18/12/16
 * Time: 6:51 μμ
 */

include "../controller/dbActions.php";


if (isset($_GET['email'], $_GET['emailCode']) == true){
    $email = trim($_GET['email']);
    $emailCode = trim($_GET['emailCode']);

    if (emailExists($email) == false){
        echo "Something went wrong in email";
    } else if(activate($email, $emailCode) == false){
        echo "We had problems activating your account!";
    } else {
        $url = "Location: ../view/login.php";
        header($url);
        exit();
    }
} else {
    $url = "Location: ../index.php";
    header($url);
    exit();
}
