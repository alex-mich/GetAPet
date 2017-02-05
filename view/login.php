<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
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
                <a class="nav-link" href="userProfile.php"><?= $userLogin->getUsername() ?></a>
            </li>
            <?php
        } else {
            ?>
            <li class="nav-item float-xs-right active">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        <?php } ?>
    </ul>
</nav>

<div class="container col-xs-3">
    <h2>Login</h2>
    <form id="loginForm" method="post" action="../controller/loginController.php">
        <!-- Username -->
        <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                <span class="input-group-addon glyphicon glyphicon-user"/>
            </div>
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <div class="input-group ">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                <span class="input-group-addon glyphicon glyphicon-lock"/>
            </div>
        </div>
        <!-- Remember Me -->
        <div class="checkbox">
            <label class="col-form-label"><input type="checkbox"> Remember me</label>
        </div>
        <!-- Sign-In Button -->
        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>

    <?php
    session_start();
    if (isset($_SESSION["inactive"])) {
        echo 'Please activate your account!';
    }else if (isset($_SESSION["wrong_credentials"])){
        echo 'Wrong Credentials!';
    }
    ?>


    <script type="text/javascript" src="../lib/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="../lib/formValidation.min.js"></script>
    <script type="text/javascript" src="../lib/validation.bootstrap.min.js"></script>

    <script>$(document).ready(function () {
            $('#loginForm').formValidation({
                framework: 'bootstrap',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'Username field can not be empty'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Password field can not be empty'
                            }
                        }
                    }
                }
            });
        });</script>
</div>

</body>
</html>

