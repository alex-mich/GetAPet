<?php

/**
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 17/12/2016
 * Time: 12:36 μμ
 */
class UserLogin
{

    function loadUser($givenUser)
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

        /** Prepare Select Query*/
        $query = "select * from users where username = (?)";

        $statement = $conn->stmt_init();
        if (!$statement->prepare($query)) {
            print "Failed to prepare statement";
        } else {
            $statement->bind_param("s", $givenUser);
            $statement->execute();
            $resultSet = $statement->get_result();

            /** Handle the result from result set */
            $r = $resultSet->fetch_row();
                $userId = $r[0];
                $firstName = $r[1];
                $lastName = $r[2];
                $username = $r[3];
                $password = $r[4];
                $email = $r[5];
                $accountType = $r[6];
                $address = $r[7];
                $telephone = $r[8];
                $userPhoto = $r[9];
                $isActive = $r[10];
                $emailCode = $r[11];
                $user = new User($userId, $firstName, $lastName, $username, $password, $email, $accountType, $address ,$telephone, $userPhoto, $isActive,$emailCode);
            return $user;
        }

        $statement->close();
        $conn->close();
    }

}