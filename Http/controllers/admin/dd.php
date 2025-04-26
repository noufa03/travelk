<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController
{
    public function sendContactEmail()
    {
        // Hardcoded recipient email
        $to = 'harithyamilaksha@gmail.com';  // Change to the recipient's email
        $subject = 'Test Email from PHPMailer + Brevo';
        $body = 'This is a test email sent using PHPMailer with Brevo SMTP!';

        $mail = new PHPMailer(true);
        try {
            // SMTP configuration with Brevo (Sendinblue)
            $mail->isSMTP();
            $mail->Host = 'smtp-relay.sendinblue.com';
            $mail->SMTPAuth = true;
            $mail->Username = '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';  // 'apikey' for Brevo
            $mail->Password = '2Zm67VIYtbCUTwkn';  // Your Brevo SMTP key
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('harithyapp2000@gmail.com', 'Milaksha');  // Replace with your email
            $mail->addAddress($to);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body);  // Plain text version

            // Send the email
            $mail->send();

            // Feedback to user
            echo 'Email sent successfully!';
        } catch (Exception $e) {
            echo "Error sending email: {$mail->ErrorInfo}";
        }
    }
}