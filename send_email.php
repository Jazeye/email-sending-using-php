<?php
// Get the form fields
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Email recipient (your Gmail address)
$to = 'pkleyebird@gmail.com';

// Email subject
$subject = 'New Contact Form Submission';

// Email body
$body = "Name: $name\nEmail: $email\nMessage:\n$message";

// Gmail SMTP configuration
$smtpUsername = 'your_gmail_username@gmail.com';
$smtpPassword = 'your_gmail_password';

// SMTP server settings (Gmail SMTP)
$smtpHost = 'smtp.gmail.com';
$smtpPort = 587; // TLS Port

// PHPMailer library (make sure you have it installed via composer)
require 'vendor/autoload.php';

// Create PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

// SMTP configuration
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;
$mail->SMTPSecure = 'tls';
$mail->Port = $smtpPort;

// Sender and recipient
$mail->setFrom($email, $name);
$mail->addAddress($to);

// Email subject and body
$mail->Subject = $subject;
$mail->Body = $body;

// Send email
if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
