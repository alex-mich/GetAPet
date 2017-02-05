<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send Message</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<?php
include 'header.php';

$receiverId = $_GET['message_user'];

$conn = DatabaseConnection::getInstance();
$query = "select username from users where user_id = ? limit 1";

$statement = $conn->stmt_init();
if (!$statement->prepare($query)) {
    echo "Try again later";
} else {
    $statement->bind_param("i", $receiverId);
    $statement->execute();
    $statement->bind_result($username);
    $statement->fetch();
    ?>

    <div class="container col-xs-3">
        <h2>Send Message</h2>
        <form id="messageForm" action="../controller/messageController.php" method="post">
            <div class="form-group">
                <label for="receiver">Receiver's Name</label>
                <input type="text" name="receiver" id="receiver" class="form-control" readonly
                       placeholder="<?php echo $username; ?>">
            </div>
            <input type="hidden" name="receiver_id" value=<?php echo $receiverId; ?>>
            <!-- Message Subject Subject -->
            <div class="form-group">
                <label for="subject" class="col-form-label">Subject</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"/>
                </div>
            </div>
            <!--Message Body-->
            <div class="form-group">
                <label for="body">Message</label>
                <textarea class="form-control" name="body" id="body" rows="4"></textarea>
            </div>
            <!-- Sign-Up Button -->
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <?php
}
?>

<script type="text/javascript" src="../lib/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../lib/bootstrap.min.js"></script>
<script type="text/javascript" src="../lib/formValidation.min.js"></script>
<script type="text/javascript" src="../lib/validation.bootstrap.min.js"></script>

<script>$(document).ready(function () {
        $('#messageForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                subject: {
                    validators: {
                        notEmpty: {
                            message: 'The subject must not be empty'
                        },
                        stringLength: {
                            max: 50,
                            message: 'The subject must be less than 50 characters'
                        }
                    }
                },
                body: {
                    validators: {
                        notEmpty: {
                            message: 'The message must not be empty'
                        },
                        stringLength: {
                            max: 200,
                            message: 'The message must be less than 200 characters'
                        }
                    }
                }
            }
        });
    });</script>
</body>
</html>