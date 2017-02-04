<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<?php
session_start();
include '../model/login/User.php';
include '../database/DatabaseConnection.php';
?>
<?php
if (isset($_SESSION["login"])) {
    $user = $_SESSION["login"];
    $userLogin = unserialize($user);
}

?>
<div class="container col-xs-3">

    <h2>UserProfile</h2>
    <form action="../controller/registerController.php" method="post">
        <!-- Username -->
        <div class="form-group">
            <label for="username" class="col-form-label">Username: <?= $userLogin->getUsername() ?></label>
            <!-- Email -->
            <div class="form-group">
                <label for="email" class="col-form-label">Email: <?= $userLogin->getEmail() ?></label>

            </div>
            <!-- Account Type -->
            <div class="form-group">
                <label class="col-form-label">Account Type: <?= $userLogin->getAccountTypeString() ?></label>
            </div>
            <!-- First Name -->
            <div class="form-group">
                <label for="firstName" class="col-form-label">First Name: <?= $userLogin->getFirstName() ?></label>

            </div>
            <!-- Last Name -->
            <div class="form-group">
                <label for="lastName" class="col-form-label">Last Name: <?= $userLogin->getLastName() ?></label>

            </div>
            <!-- Telephone -->
            <div class="form-group">
                <label for="telephone" class="col-form-label">Telephone: <?= $userLogin->getTelephone() ?></label>

            </div>
            <!-- Home Address -->
            <div class="form-group">
                <label for="address" class="col-form-label">Home Address: <?= $userLogin->getAddress() ?></label>

            </div>
    </form>

    <table width="600" border="1">
        <tr>
            <th>pet_type</th>
            <th>pet_breed</th>
            <th>pet_age</th>
            <th>advert_type</th>
            <th>advert_details</th>
            <th>pet_photo</th>
            <th>s_date</th>
            <th>l_date</th>
        </tr>
            <?php
            $db = DatabaseConnection::getInstance();
            $userId = $userLogin->getUserId();
            $query = "select * from pets where user_id='$userId'order by time DESC";
            $rows = $db->query($query);

            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?= $row['pet_type'] ?></td>
                    <td><?= $row['pet_breed'] ?></td>
                    <td><?= $row['pet_age'] ?></td>
                    <td><?= $row['advert_type'] ?></td>
                    <td><?= $row['advert_details'] ?></td>
                    <td><?= $row['pet_photo'] ?></td>
                    <td><?= $row['time'] ?></td>
                </tr>
            <?php } ?>
    </table>
</div>
</body>
</html>