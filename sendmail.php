<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php/PHPMailer-master/src/Exception.php';
require 'php/PHPMailer-master/src/PHPMailer.php';
require 'php/PHPMailer-master/src/SMTP.php';

// Create a new PHPMailer instance
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $to_email = $_POST['to_email'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $from_email = 'achyuthkumarpala126@gmail.com';
     // Email content
     $infoaboutmail  = "Dear $name,

     We would like to extend a warm welcome to you and express our sincere gratitude for choosing SB Interiors to help bring your interior design visions to life. Your registration details have been received, and we are thrilled to have you on board!
     
     Here's a brief summary of the information you provided:
     
     Name: $name
     Contact Number: $contact_no
     Email Address: $to_email
     Address: $address
     Your message:
     $message
     
     Our team is dedicated to creating spaces that not only reflect your unique style but also enhance the functionality and aesthetics of your living or work environment. We are excited to embark on this creative journey with you.
     
     What's Next?
     A member of our design team will be in touch with you shortly to discuss your project in more detail. We'll schedule a convenient time for a consultation to understand your preferences, ideas, and requirements. Feel free to reach out to us at sbenterprises0243@gmail.com or +91 91138 82673 if you have any immediate questions or requests.
     
     Thank you for choosing SB Interiors. We look forward to turning your design dreams into reality.
     
     Best regards,";

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = 0; // 0 for no output, 2 for detailed debugging
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $from_email; // Your Gmail email address
    $mail->Password = 'ohtd jjdh syvd cutk'; // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom($from_email, 'Achyuth Kumar P');
    $mail->addAddress($to_email);

    // Email content
    $mail->isHTML(false); // Set to true if you want to send HTML content
    $mail->Subject = 'Thank You for Registering with SB Interiors';
    $mail->Body = $infoaboutmail ;

    // Send the email
    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo 'Email could not be sent. Error: ', $mail->ErrorInfo;
}
}
else{
    header('Location: index.html');
}
