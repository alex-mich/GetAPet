<!DOCTYPE html>
<html lang="en">
<head>
    <title>Messages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
</head>
<body>
<?php
include 'header.php';
include '../model/Message.php';

if (isset($_SESSION["login"])) {
    $user = $_SESSION["login"];
    $userLogin = unserialize($user);

    $conn = DatabaseConnection::getInstance();
    $query = "select * from messages where receiver_id = ? order by date_sent DESC";

    $statement = $conn->stmt_init();
    if (!$statement->prepare($query)) {
        echo "Try again later";
    } else {
        $userId = $userLogin->getUserId();
        $statement->bind_param("i", $userId);
        $statement->execute();
        $result = $statement->get_result();
        while ($row = $result->fetch_assoc()) {
            $message = new Message($row['sender_id'], $row['receiver_id'], $row['message_subject'], $row['message_body'], $row['date_sent'])
            ?>
            <div class="card-deck-wrapper">
                <div class="card-deck"">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title"><?= $message->getMessageSubject() ?></h4>
                            <p class="card-text"><?= $message->getMessageBody() ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            <p class="card-text float-xs-left">
                                <small>Message sent at: <?= $message->getMessageDate() ?> </small>
                            </p>
                            <?php
                            if (isset($_SESSION["login"])) {
                                $user = $_SESSION["login"];
                                $userLogin = unserialize($user);
                                    ?>
                                    <form method="GET" action="sendMessage.php">
                                        <button type="submit" class="btn btn-primary" name="message_user"
                                                value="<?= $message->getSenderId() ?>">Reply
                                        </button>
                                    </form>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    }
} ?>

</body>
</html>
