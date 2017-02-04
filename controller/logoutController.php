<?php
/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 17/12/2016
 * Time: 17:08 μμ
 */

session_start();

unset($_SESSION["login"]);

$url = "Location: ../view/login.php";
header($url);



