<?php
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_REQUEST['send'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];

    


    if (!empty($subject) && !empty($message)) {

        $html = '<div style="background-color:#f4f4f4;padding:5%">
                    <table>
                        <tr>
                            <th>Name</th>
                            <td>' . $name . '</td>
                        </tr>
                        <tr>
                            <th>message</th>
                            <td>' . $message . '</td>
                        </tr>
                        </table>
                </div>';

        $mail = new PHPMailer(true);
        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mkapadwala87@gmail.com';                     //SMTP username
            $mail->Password   = 'ddyl rlvw mtbo nbph';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


            //Recipients
            $mail->setFrom('mohammad@example.com', 'Mailer');
            $mail->addAddress($email);     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('mohammad@example.com', 'Information');
            /*   $mail->addCC('cc@example.com');
             $mail->addBCC('bcc@example.com'); */

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $html;
            $mail->AltBody = strip_tags($html);

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="email" name="email" placeholder="email"><br />
        <input type="text" name="name" placeholder="name"><br />
        <input type="text" name="subject" placeholder="subject"><br />
        <textarea name="message" placeholder="message"></textarea><br />
        <button name="send" value="send">send</button>
    </form>
</body>

</html>