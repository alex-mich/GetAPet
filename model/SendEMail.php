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
    private $emailCode;
    private $realName;

    public function __construct($userEmail, $emailCode, $realName)
    {
        $this->userEmail = $userEmail;
        $this->emailCode = $emailCode;
        $this->realName = $realName;
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
        $mail->Body = "Hello " . $this->realName . ", thanks for registering on our page. Please click on the link below to activate your account.
          or copy and paste the link to your browser in order to activate your account! http://localhost:8888/controller/activateAccount.php?emailCode=" . $this->emailCode
         . "&email=" . $this->userEmail;

        if ($mail->Send()) {
            echo "Send email succesfully";
        } else {
            echo "Send mail fail!";
        }

    }
}
