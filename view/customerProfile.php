<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<?php
include 'header.php';

$user_id = $_GET['userId'];

$conn = DatabaseConnection::getInstance();
/** Prepare Select Query*/
$query = "select * from users where user_id = (?)";

$statement = $conn->stmt_init();

if (!$statement->prepare($query)) {
    print "Failed to prepare statement";
} else {
    $statement->bind_param("i", $user_id);
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
    $user = new User($userId, $firstName, $lastName, $username, $password, $email, $accountType, $address, $telephone, $userPhoto, $isActive, $emailCode);
}

?>
<div class="container col-xs-3">

    <h2>Customer Profile</h2>
    <!-- Username -->
    <div class="form-group">
        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($user->getUserPhoto()) . '" width="290" height="290">'; ?>
        <br>
        <div class="form-group">
            <label for="username" class="col-form-label">Username:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $user->getUsername() ?>"/>
            </div>
        </div>
        <!-- Email -->
        <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $user->getEmail() ?>"/>
            </div>
        </div>
        <!-- Account Type -->
        <div class="form-group">
            <label class="col-form-label">Account Type:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value="<?= $user->getAccountTypeString() ?>"/>
            </div>
        </div>
        <!-- First Name -->
        <div class="form-group">
            <label for="firstName" class="col-form-label">First Name:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value="<?= $user->getFirstName() ?>"/>
            </div>

        </div>
        <!-- Last Name -->
        <div class="form-group">
            <label for="lastName" class="col-form-label">Last Name:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $user->getLastName() ?>"/>
            </div>
        </div>
        <!-- Telephone -->
        <div class="form-group">
            <label for="telephone" class="col-form-label">Telephone:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $user->getTelephone() ?>"/>
            </div>
        </div>
        <!-- Home Address -->
        <div class="form-group">
            <label for="address" class="col-form-label">Home Address:</label>
            <div class="input-group">
                <input type="text" class="form-control" name="username" id="username" disabled
                       value=" <?= $user->getAddress() ?>"/>
            </div>
        </div>
    </div>

</body>
</html>