<!--
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 23/12/2016
 * Time: 5:46 μμ
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Advertisements' Overview</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
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

<!-- Navigation Bar -->
<nav class="navbar navbar-light bg-faded">
    <!-- Logo -->
    <a href="../index.php" class="navbar-brand">Get a Pet</a>

    <!-- Menu items -->
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="petsForSale.php">Pets for Sale</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="petsForAdoption.php">Looking For Pets</a>
        </li>
        <?php
        if (isset($_SESSION["login"])) {
            $user = $_SESSION["login"];
            $userLogin = unserialize($user);
            ?>
            <li class="nav-item">
                <a class="nav-link" href="AddPet.php">Add Pet</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="MyAdverts.php">My Advertisements</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="../controller/logoutController.php">Logout</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="userProfile.php"><?= $userLogin->getUsername() ?></a>
            </li>
            <?php
        } else {
            ?>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        <?php } ?>
    </ul>
</nav>

<?php

if (isset($_SESSION["login"])) {
    $currentLogin = $_SESSION["login"];
    $loggedUser = unserialize($currentLogin);

    $conn = DatabaseConnection::getInstance();
    $query = "select * from pets WHERE user_id = (?) order by time DESC ";

    $statement = $conn->stmt_init();
    if (!$statement->prepare($query)) {
        echo "Try again later";
    } else {
        $userId = $loggedUser->getUserId();
        $statement->bind_param("s", $userId);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
            $advertType = getAdvertType($row['advert_type']);
            ?>
            <div class="card-deck-wrapper">
                <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top img-thumbnail" src="../images/dog1.jpg" alt="Card image cap">
                        <div class="card-block">
                            <h4 class="card-title"><?= $row['pet_type'] ?></h4>
                            <p class="card-text">Breed: <?= $row["pet_breed"] ?></p>
                            <p class="card-text">Age: <?= $row["pet_age"] ?></p>
                            <p class="card-text"> <?= $advertType?></p>
                            <p class="card-text"> <?= $row["advert_details"]?></p>
                            <p class="card-text"> Due Time: <?= $row["due_time"]?></p>
                            <form method="get" action="EditPet.php">
                                <button type="submit" class="btn btn-primary" name="edit_adv"
                                        value="<?= $row['pet_id'] ?>">Edit
                                </button>
                            </form>
                            <form method="get" action="../controller/DeletePetController.php">
                                <button type="submit" class="btn btn-danger" name="delete_adv"
                                        value="<?= $row['pet_id'] ?>">Delete Advertisement
                                </button>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            <p class="card-text float-xs-right">
                                <small> Last updated <?= $row["time"] ?> </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }
} ?>

<?php
function getAdvertType($advertType){
    switch($advertType){
        case 0:
            return "For sale";
        case 1:
            return "For adoption";
    }
}?>


</body>
</html>



