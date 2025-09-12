<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require_once 'vendor/autoload.php';

class SendMail
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->setupSMTP();
    }

    private function setupSMTP()
    {
        try {
            //Server settings
            $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = 'Boochimo9@gmail.com';                     //SMTP username
            $this->mail->Password   = 'ugagbkkgujrlbeaw';                               //SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $this->mail->CharSet = 'UTF-8';
        } catch (Exception $e) {
            throw new Exception("SMTP setup failed: " . $e->getMessage());
        }
    }

    // Validate email address
    public function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Send welcome email - simple version
    public function sendWelcomeEmail($member_name, $member_email, $member_id)
    {
        if (!$this->validateEmail($member_email)) {
            return false;
        }

        try {
            //Recipients
            $this->mail->setFrom('info@ridelinksacco.co.ke', 'RideLink SACCO');
            $this->mail->addAddress($member_email, $member_name);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@ridelinksacco.co.ke', 'RideLink SACCO Support');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments - COMMENTED OUT (these paths don't exist on Windows)
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = 'Welcome to RideLink SACCO!';
            $this->mail->Body = "Hello " . $member_name . ",<br><br>Welcome to RideLink SACCO!<br>Your Member ID: " . $member_id . "<br><br>Thank you for joining us!";
            $this->mail->AltBody = "Hello " . $member_name . ", Welcome to RideLink SACCO! Your Member ID: " . $member_id;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    // Send verification email - simple version
    public function sendVerificationEmail($member_name, $member_email, $verification_link)
    {
        if (!$this->validateEmail($member_email)) {
            return false;
        }

        try {
            //Recipients
            $this->mail->setFrom('info@ridelinksacco.co.ke', 'RideLink SACCO');
            $this->mail->addAddress($member_email, $member_name);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@ridelinksacco.co.ke', 'RideLink SACCO Support');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments - COMMENTED OUT (these paths don't exist on Windows)
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = 'Welcome to RideLink SACCO! Account Verification';
            $this->mail->Body = "Hello " . $member_name . ",<br><br>You requested an account on RideLink SACCO.<br>In order to use this account you need to <a href='" . $verification_link . "'>Click Here</a> to complete the registration process.<br><br>Regards,<br>Systems Admin<br>RideLink SACCO";
            $this->mail->AltBody = "Hello " . $member_name . ", You requested an account on RideLink SACCO. Click here to complete registration: " . $verification_link;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}