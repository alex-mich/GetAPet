<?php

/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 23/12/2016
 * Time: 2:57 μμ
 */
class DatabaseConnection
{

    private static $connection;

    private static $host = "localhost";
    private static $uname = "root";
    private static $psswd = "root";
    private static $dbname = "getapet";


    public static function getInstance()
    {
        if (!isset(self::$connection)) {
            self::$connection = new mysqli(self::$host, self::$uname, self::$psswd, self::$dbname);
        }
        return self::$connection;
    }


}