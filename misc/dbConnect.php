<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 8/12/16
 * Time: 11:11 μμ
 */

function getConnection()
{
    /** Initiate Connection */
    $host = "localhost";
    $uname = "root";
    $psswd = "root";
    $dbname = "getapet";

    $conn = new mysqli($host, $uname, $psswd, $dbname);

    if ($conn->connect_error) {
        die("$conn->connect_errno: $conn->connect_error");
    }

    return $conn;
}
