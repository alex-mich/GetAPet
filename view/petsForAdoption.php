<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pets for Adoption</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<?php
include '../database/DatabaseConnection.php';

$conn = DatabaseConnection::getInstance();
$query = "select * from pets  where advert_type=1 order by time DESC ";

$statement = $conn->stmt_init();
if (!$statement->prepare($query)) {
    echo "Try again later";
} else {
    $statement->bind_param("s", $userId);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card-deck-wrapper">
            <div class="card-deck">
                <div class="card">
                    <img class="card-img-top img-thumbnail" src="../images/dog1.jpg" alt="Card image cap">
                    <div class="card-block">
                        <h4 class="card-title"><?= $row['pet_type'] ?></h4>
                        <p class="card-text">Breed: <?= $row["pet_breed"] ?></p>
                        <p class="card-text">Age: <?= $row["pet_age"] ?></p>
                        <p class="card-text"> <?= $row["advert_details"] ?></p>
                        <p class="card-text"> Due Time: <?= $row["due_time"] ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <p class="card-text float-xs-right">
                            <small> Last updated <?= $row["time"] ?> </small>
                        </p>
                        <form method="GET" action="petFullView.php">
                            <button type="submit" class="btn btn-primary" name="details_adv"
                                    value="<?= $row['pet_id'] ?>">See Details
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php }

} ?>

</body>
</html>
