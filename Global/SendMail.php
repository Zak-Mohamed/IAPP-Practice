<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once __DIR__ . '/../vendor/autoload.php';

class SendMail
{
    public function sendMail($name)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0; // Set to 0 for production, 2 for debugging
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = 'Boochimo9@gmail.com'; //SMTP username
            $mail->Password = ''; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to

            //Recipients
            $mail->setFrom('info@ridelinksacco.co.ke', 'RideLink SACCO');
            $mail->addAddress('zakariya.mohamed@strathmore.edu', $name); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Welcome to RideLink SACCO - Your Transport Partner';
            $mail->Body = 'Welcome to RideLink SACCO! Thank you for joining our transport family.';
            $mail->AltBody = 'Welcome to RideLink SACCO! Thank you for joining our transport family.';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
