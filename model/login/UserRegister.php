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
    private static $userId = null;

    function registerUser($username, $password, $user_email, $accountType, $firstName, $lastName, $telephone, $address, $emailCode, $file, $conn)
    {

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
            $statement->bind_param("isssssissbis", self::$userId, $firstName, $lastName, $username, $password, $user_email, $accountType, $address, $telephone, $file, self::$isActive, $emailCode);
            $statement->send_long_data(9, $file);
            $success = $statement->execute();

            return $success;
        }

        $statement->close();
        $conn->close();
    }

    function checkUserName($username, $conn)
    {

        if ($conn->connect_error) {
            die("$conn->connect_errno: $conn->connect_error");
        }

        /** Prepare Insert Query*/
        $query = "SELECT USERNAME FROM USERS WHERE username = (?)";

        $statement = $conn->stmt_init();
        if (!$statement->prepare($query)) {
            print "Failed to prepare statement";
        } else {

            /** Bind Params into the Prepared Statement */
            $statement->bind_param("s", $username);
            $statement->execute();
            $statement->store_result();
            $countRows = $statement->num_rows;

            return $countRows;
        }

        $statement->close();
        $conn->close();
    }

    function checkMail($email, $conn)
    {

        if ($conn->connect_error) {
            die("$conn->connect_errno: $conn->connect_error");
        }

        /** Prepare Insert Query*/
        $query = "SELECT email FROM USERS WHERE email = (?)";

        $statement = $conn->stmt_init();
        if (!$statement->prepare($query)) {
            print "Failed to prepare statement";
        } else {

            /** Bind Params into the Prepared Statement */
            $statement->bind_param("s", $email);
            $statement->execute();
            $statement->store_result();
            $countRows = $statement->num_rows;

            return $countRows;
        }

        $statement->close();
        $conn->close();
    }


}