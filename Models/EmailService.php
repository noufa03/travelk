<?php

namespace Models;
use Core\App;
use Core\Database;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    public function sendEmail($to, $subject, $body)
    {
        $mail = new PHPMailer(true);
        try {
            // SMTP configuration with Brevo
            $mail->isSMTP();
            $mail->Host = 'smtp-relay.sendinblue.com';
            $mail->SMTPAuth = true;
            $mail->Username = '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';  // 'apikey' for Brevo
            $mail->Password = '2Zm67VIYtbCUTwkn';  // SMTP key from Brevo
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender and recipient
            $mail->setFrom('your_email@example.com', 'Your Name');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AltBody = strip_tags($body);  // For email clients that do not support HTML

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }