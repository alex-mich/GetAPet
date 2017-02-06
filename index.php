<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Get a Pet</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link href="lib/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="lib/jquery-3.1.1.min.js"></script>
    <script src="lib/jquery-ui.js"></script>
    <link href="lib/float_search.css" rel="stylesheet">
    <script type="text/javascript">
        $(function () {
            $('#petType').autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: "view/searchbarPetTypes.php",
                        dataType: "json",
                        data: {q: request.term},
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                minLength: 1
            });
        });
    </script>

</head>

<body>
<?php
session_start();
include 'model/login/User.php';
include 'database/DatabaseConnection.php';

$db = DatabaseConnection::getInstance(); ?>
<!-- Navigation Bar -->
<nav class="navbar navbar-light bg-faded">
    <!-- Logo -->
    <a href="#" class="navbar-brand">Get a Pet</a>

    <!-- Menu items -->
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view/petsForSale.php">Pets for Sale</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="view/petsForAdoption.php">Looking For Pets</a>
        </li>
        <!--        <li class="nav-item">-->
        <!--            <a class="nav-link" href="">Pets Wanted</a>-->
        <!--        </li>-->
        <?php
        if (isset($_SESSION["login"])) {
            $user = $_SESSION["login"];
            $userLogin = unserialize($user);
            ?>
            <li class="nav-item">
                <a class="nav-link" href="view/AddPet.php">Add Pet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view/MyAdverts.php">My Advertisements</a>
            </li>

            <li class="nav-item float-xs-right">
                <a class="nav-link" href="controller/logoutController.php">Logout</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="view/messages.php">Messages</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="view/userProfile.php"><?= $userLogin->getUsername() ?></a>
            </li>
            <?php
        } else {
            ?>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="view/login.php">Login</a>
            </li>
            <li class="nav-item float-xs-right">
                <a class="nav-link" href="view/register.php">Register</a>
            </li>
        <?php } ?>
    </ul>
</nav>

<form id="searchForm" method="get" action="view/searchPets.php">
    <div class="input-group col-md-12">
        <input name="petType" id="petType" type="text" class="  search-query form-control"
               placeholder="Search"/>
        <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Search</button>
        </span>
    </div>
</form>

<!-- Carousel -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block mx-auto" max-width="100%" max-height="100%" src="images/welcome.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block mx-auto" max-width="100%" max-height="100%" src="images/welcome.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block mx-auto" max-width="100%" max-height="100%" src="images/welcome.jpg" alt="Third slide">
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="icon-prev" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="icon-next" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<!-- Card deck -->
<?php
if (isset($_SESSION["login"])) {
?>
<h3 class="text-muted">Posts based on your preferences!</h3>
<div class="card-deck-wrapper">
    <div class="card-deck">
        <?php
        $cardsQuery = "select * from pets where pet_type like '%" .$userLogin->getDesiredPet() ."%' limit 5";
        //$cardsQuery = "select * from pets order by time DESC limit 5";
        $result = $db->query($cardsQuery);

        //$data = array();

        /*while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }*/

        foreach ($result as $row) {
            ?>
            <div class="card">
                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['pet_photo']) . '" width="290" height="290">'; ?>
                <div class="card-block">
                    <h4 class="card-title"><?= $row['pet_type'] ?></h4>
                    <p class="card-text"><?= $row['advert_details'] ?></p>
                    <form method="GET" action="view/customerProfile.php">
                        <button type="submit" class="btn btn-primary" name="userId"
                                value="<?= $row['user_id'] ?>">Customer Profile
                        </button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <p class="card-text float-xs-right">
                        <small> Last updated <?= $row['time'] ?> </small>
                    </p>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
<?php } ?>

<h3 class="text-muted">Most Recent Posts!</h3>
<div class="card-deck-wrapper">
    <div class="card-deck">
        <?php
        $cardsQuery = "select * from pets order by time DESC limit 5";
        $rows = $db->query($cardsQuery);

        foreach ($rows as $row) {
        ?>
        <div class="card">
            <?php
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row["pet_photo"]) . '" width="290" height="290">';
            ?>
            <div class="card-block">
                <h4 class="card-title"><?= $row['pet_type'] ?></h4>
                <p class="card-text"><?= $row['advert_details'] ?></p>
                <form method="GET" action="view/customerProfile.php">
                    <button type="submit" class="btn btn-primary" name="userId"
                            value="<?= $row['user_id'] ?>">Customer Profile
                    </button>
                </form>
            </div>
            <div class="card-footer text-muted">
                <p class="card-text float-xs-right">
                    <small> Last updated <?= $row['time'] ?> </small>
                </p>
            </div>
        </div>
        <?php } ?>

    </div>
</div>


<!--<!-- jQuery first, then Tether, then Bootstrap JS. -->-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"-->
<!--        integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"-->
<!--        integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8"-->
<!--        crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
        integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK"
        crossorigin="anonymous"></script>
</body>
</html>