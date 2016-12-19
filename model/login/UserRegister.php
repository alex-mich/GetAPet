<?php

/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 18/12/2016
 * Time: 7:22 μμ
 */
class UserRegister
{

    private static $isActive = 0;
    private static $photo = null;
    private static $userId = null;

    function registerUser($username, $password, $user_email, $accountType, $firstName, $lastName, $telephone, $address, $emailCode)
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

        /** Prepare Insert Query*/
        $query = "INSERT INTO USERS VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $statement = $conn->stmt_init();
        if (!$statement->prepare($query)) {
            print "Failed to prepare statement";
        } else {

            /** Bind Params into the Prepared Statement */
            $statement->bind_param("isssssissbis", self::$userId, $firstName, $lastName, $username, $password, $user_email, $accountType, $address, $telephone, self::$photo, self::$isActive, $emailCode);
            $success = $statement->execute();

            return $success;
        }

        $statement->close();
        $conn->close();
    }


}