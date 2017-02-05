<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pets for Sale</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<?php
include 'header.php';
include_once '../model/login/User.php';
include '../model/PetDetails.php';

$conn = DatabaseConnection::getInstance();
$query = "select * from pets  where advert_type = 0 order by time DESC ";

$statement = $conn->stmt_init();
if (!$statement->prepare($query)) {
    echo "Try again later";
} else {
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        $petDetails = new PetDetails($row['pet_id'], $row['user_id'], $row['pet_type'], $row["pet_breed"], $row["pet_age"],
            $row["advert_type"], $row["advert_details"], $row["pet_photo"], $row["time"], $row["due_time"]);
        ?>
        <div class="card-deck-wrapper">
            <div class="card-deck">
                <div class="card">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($petDetails->getPetPicture()) . '" width="290" height="290">';?>
                    <div class="card-block">
                        <h4 class="card-title"><?= $petDetails->getPetType() ?></h4>
                        <p class="card-text">Breed: <?= $petDetails->getPetBreed() ?></p>
                        <p class="card-text">Age: <?= $petDetails->getAge() ?></p>
                        <p class="card-text"> <?= $petDetails->getAdvertDetails() ?></p>
                        <p class="card-text"> Due Time: <?= $petDetails->getDueTime() ?></p>
                    </div>

                    <div class="card-footer text-muted">
                        <p class="card-text float-xs-right">
                            <small> Date Added: <?= $petDetails->getTime() ?> </small>
                        </p>
                        <form method="GET" action="customerProfile.php">
                            <button type="submit" class="btn btn-primary" name="userId"
                                    value="<?= $petDetails->getUserId() ?>">Customer Profile
                            </button>
                        </form>
                        <?php
                        if (isset($_SESSION["login"])) {
                            $user = $_SESSION["login"];
                            $userLogin = unserialize($user);
                            if ($userLogin->getUserId() != $petDetails->getUserId()) {
                                ?>
                                <form method="GET" action="sendMessage.php">
                                    <button type="submit" class="btn btn-primary" name="message_user"
                                            value="<?= $petDetails->getUserId() ?>">Send Message
                                    </button>
                                </form>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>

</body>
</html>