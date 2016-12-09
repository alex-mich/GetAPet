<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 8/12/16
 * Time: 11:11 μμ
 */

    $serverName = "localhost";
    $username = "root";
    $password = "root";

    // Create connection
    try{
        $db = new PDO("mysql:dbname=getapet;host=$serverName", $username, $password);
    } catch (PDOException $e){
        echo "Connection failed." . $e->getMessage();
    }
