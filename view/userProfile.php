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
include 'header.php';
if (isset($_SESSION["login"])) {
    $user = $_SESSION["login"];
    $userLogin = unserialize($user);
}
?>
<div class="container col-xs-3">

    <h2>Customer Profile</h2>
    <!-- Username -->
    <div class="form-group">
        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($userLogin->getUserPhoto()) . '" width="290" height="290">'; ?>
        <br>
        <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $userLogin->getUsername() ?>"/>
            </div>
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $userLogin->getEmail() ?>"/>
            </div>
        </div>
        <!-- Account Type -->
        <div class="form-group">
            <label class="col-form-label">Account Type:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value="<?= $userLogin->getAccountTypeString() ?>"/>
            </div>
        </div>
        <!-- First Name -->
        <div class="form-group">
            <label for="firstName" class="col-form-label">First Name:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value="<?= $userLogin->getFirstName() ?>"/>
            </div>

        </div>
        <!-- Last Name -->
        <div class="form-group">
            <label for="lastName" class="col-form-label">Last Name:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $userLogin->getLastName() ?>"/>
            </div>
        </div>
        <!-- Telephone -->
        <div class="form-group">
            <label for="telephone" class="col-form-label">Telephone:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $userLogin->getTelephone() ?>"/>
            </div>
        </div>
        <!-- Home Address -->
        <div class="form-group">
            <label for="address" class="col-form-label">Home Address:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $userLogin->getAddress() ?>"/>
            </div>
        </div>
    </div>
</body>
</html>