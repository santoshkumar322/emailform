<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "index.php";

//require 'vendor/autoload.php'; // if installed via composer
 require 'PHPMailer_master/src/PHPMailer.php'; // if manual

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Example: Gmail SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_email@gmail.com'; // Your Gmail
        $mail->Password   = 'your_app_password'; // Use App Password, not real password
        $mail->SMTPSecure = 'tls'; // or 'ssl'
        $mail->Port       = 587; // 465 for SSL

        // Sender & Recipient
        $mail->setFrom($email, $name);
        $mail->addAddress('santoshkr322@gmail.com'); // Where you want to receive mail

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Submission";
        $mail->Body    = "<h3>Name: $name</h3><h4>Email: $email</h4><p>$message</p>";

        $mail->send();
        echo "Message has been sent successfully!";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
