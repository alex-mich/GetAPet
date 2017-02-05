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
            <li class="nav-item float-xs-right active">
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
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($userLogin->getUserPhoto()) . '" width="290" height="290">';
            ?>
    </form>
</div>


    <a href="MyAdverts.php">User advertisements</a>

</body>
</html>