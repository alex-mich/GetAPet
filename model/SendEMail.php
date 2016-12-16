<?php
/**
 * Created by PhpStorm.
 * User: eliamyro
 * Date: 13/12/16
 * Time: 11:24 πμ
 */


require("../PHPMailer/PHPMailerAutoload.php");
class SendEMail
{
    private $userEmail;

    public function __construct($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function sendMail()
    {

        $mail = new PHPMailer();

        $mail->isSMTP();            // Set mailer to use SMTP.
        $mail->SMTPDebug = 2;
        $mail->From = "info.getapet@gmail.com";
        $mail->FromName = "Get a Pet";
        $mail->Host = "smtp.gmail.com";             // Specific SMTP server.
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "info.getapet@gmail.com";           // SMTP username.
        $mail->Password = "getapet123";
        $mail->addAddress($this->userEmail, "Get a Pet");

        $mail->isHTML(true);
        $mail->Subject = "Account activation";
        $mail->Body = "Click on the link to activate your account.";

        if ($mail->Send()) {
            echo "Send email succesfully";
        } else {
            echo "Send mail fail!";
        }

    }
}
