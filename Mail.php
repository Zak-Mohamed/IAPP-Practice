<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'Boochimo9@gmail.com';                     //SMTP username
    $mail->Password   = 'ugagbkkgujrlbeaw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@ridelinksacco.co.ke', 'RideLink SACCO');
    $mail->addAddress('member@ridelinksacco.co.ke', 'New Member');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@ridelinksacco.co.ke', 'RideLink SACCO Support');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments - COMMENTED OUT (these paths don't exist on Windows)
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome to RideLink SACCO - Your Transport Partner';
    $mail->Body    = '
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <div style="background: linear-gradient(135deg, #2c3e50, #3498db); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0;">
            <h1 style="margin: 0; font-size: 2em;">🚌 Welcome to RideLink SACCO!</h1>
            <p style="margin: 10px 0 0 0; font-size: 1.2em;">Your Reliable Transport Partner</p>
        </div>
        
        <div style="background: #f8f9fa; padding: 30px; border-radius: 0 0 10px 10px;">
            <h2 style="color: #2c3e50; margin-top: 0;">Thank you for joining our SACCO family!</h2>
            
            <p style="color: #34495e; line-height: 1.6;">We are excited to have you as a member of RideLink SACCO. As your trusted transport partner, we are committed to providing you with:</p>
            
            <ul style="color: #34495e; line-height: 1.8;">
                <li>🚌 <strong>Safe & Reliable Transport</strong> - Well-maintained vehicles with experienced drivers</li>
                <li>💰 <strong>Affordable Rates</strong> - Competitive pricing for all our routes</li>
                <li>⏰ <strong>On-Time Service</strong> - Punctual departures and arrivals</li>
                <li>📱 <strong>Easy Booking</strong> - Online booking system for your convenience</li>
                <li>🎯 <strong>Multiple Routes</strong> - Coverage across Nairobi and surrounding areas</li>
            </ul>
            
            <div style="background: #e8f4fd; padding: 20px; border-radius: 8px; margin: 20px 0;">
                <h3 style="color: #2c3e50; margin-top: 0;">Your Member Benefits:</h3>
                <p style="color: #34495e; margin: 0;">• Priority booking during peak hours<br>
                • Member discounts on regular routes<br>
                • SMS notifications for route updates<br>
                • 24/7 customer support</p>
            </div>
            
            <p style="color: #34495e; line-height: 1.6;">If you have any questions or need assistance, please don\'t hesitate to contact us:</p>
            
            <div style="background: #2c3e50; color: white; padding: 20px; border-radius: 8px; text-align: center; margin: 20px 0;">
                <p style="margin: 5px 0;"><strong>📞 Phone:</strong> +254 700 000 000</p>
                <p style="margin: 5px 0;"><strong>📧 Email:</strong> info@ridelinksacco.co.ke</p>
                <p style="margin: 5px 0;"><strong>📍 Address:</strong> Nairobi, Kenya</p>
            </div>
            
            <p style="color: #34495e; text-align: center; font-style: italic;">Thank you for choosing RideLink SACCO. We look forward to serving you!</p>
            
            <div style="text-align: center; margin-top: 30px;">
                <p style="color: #7f8c8d; font-size: 0.9em;">© 2024 RideLink SACCO. All rights reserved.</p>
            </div>
        </div>
    </div>';
    $mail->AltBody = 'Welcome to RideLink SACCO! Thank you for joining our transport family. We are committed to providing safe, reliable, and affordable transport services across Nairobi. Contact us at +254 700 000 000 or info@ridelinksacco.co.ke for any assistance.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>