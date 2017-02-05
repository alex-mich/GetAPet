<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 5/2/17
 * Time: 9:42 πμ
 */

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
        <li class="nav-item">
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
            <li class="nav-item">
                <a class="nav-link" href="MyAdverts.php">My Advertisements</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="../controller/logoutController.php">Logout</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="messages.php">Messages</a>
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