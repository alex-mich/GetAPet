<!--
 * Created by PhpStorm.
 * User: A.Michailidis
 * Date: 23/12/2016
 * Time: 7:25 μμ
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit your Advertisement</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<?php
include '../database/DatabaseConnection.php';

$pet_id = $_GET["edit_adv"];

$conn = DatabaseConnection::getInstance();
$petDetailsQuery = "select * from pets WHERE pet_id = (?)";

$statement = $conn->stmt_init();
if (!$statement->prepare($petDetailsQuery)) {
    echo "Try again later";
} else {
    $statement->bind_param("s", $pet_id);
    $statement->execute();
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="container col-xs-3">
            <h2>Edit your Advertisement</h2>
            <form method="post" action="../controller/AddPetController.php">
                <!--Pet type-->
                <div class="form-group">
                    <label for="pet_type" class="col-form-label">Pet type:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet_type" id="pet_type"
                               placeholder="<?= $row['pet_type'] ?>">
                    </div>
                </div>
                <!-- Pet breed-->
                <div class="form-group">
                    <label for="pet_breed" class="col-form-label">Pet breed:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet_breed" id="pet_breed"
                               placeholder="<?= $row['pet_breed'] ?>">
                    </div>
                </div>
                <!--Pets current age-->
                <div class="form-group">
                    <label for="pet_age" class="col-form-label">Pets current age:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="pet_age" id="pet_age"
                               placeholder="<?= $row['pet_age'] ?>">
                    </div>
                </div>
                <!--Advert type-->
                <div class="form-group">
                    <label class="col-form-label">Advert Type</label>
                    <fieldset class="form-group">
                        <label class="form-check-inline">
                            <input class="form-check-input" type="radio" name="advert_type" id="optionradios1"
                                  value="0" <?php if($row['advert_type'] == 0){?>checked="checked"<?php }?>>For
                            Sale
                        </label>
                        <label class="form-check-inline">
                            <input class="form-check-input" type="radio" name="advert_type" id="optionradios2"
                                   value="1" <?php if($row['advert_type'] == 1){?>checked="checked"<?php }?>>For
                            Adoption
                        </label>
                    </fieldset>
                </div>
                <!--text area-->
                <div class="form-group">
                    <label for="textarea">Full advert details</label>
                    <textarea class="form-control" name="advert_details" id="textarea" rows="4"><?= $row['advert_details'] ?>
                    </textarea>
                </div>
                <!-- Add Pet Picture -->
                <img class="card-img-top img-thumbnail" src="../images/dog1.jpg" alt="Card image cap">
                <div class="form-group">
                    <label for="imageInput">Pet Picture</label>
                    <input type="file" class="form-control-file" id="imageInput">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <?php }
} ?>

</body>
</html>



