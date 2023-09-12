<?php 

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require 'vendor/phpmailer/phpmailer/src/Exception.php';
// require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//Create an instance of PHPMailer
$mail = new PHPMailer(true); // pass true to enable debugging and handle errors

try {
    $mail->SMTPDebug = 1; // enable debugging    

    $mail->isSMTP(); // use smtp connection to send email                                       

    $mail->Host = 'smtp.gmail.com'; //set up the gmail SMTP host name                     

    $mail->SMTPAuth = true; // use SMTP Authentication to allow your account to authenticate                                 $mail->Username = '<YOUR-GMAIL-EMAIL-ADDRESS>';                     $mail->Password = '<YOUR-ACCOUNT-PASSWORD>';                               $mail->Port = 587; // set the SMTP port in Gmail

    $mail->Username = "elfsulac67@gmail.com";
    $mail->Password = "qgtfzsvyrjvvungg";
   
    $mail->SMTPSecure = "ssl"; // use TLS when sending the email       
    $mail->Port = 465;                      

    // $mail->setFrom('goodhelp1210@gmail.com'); //defining the sender

    $mail->addAddress('procosep@gmail.com');
    $mail->isHTML(true);
    $mail->Subject='Reset your password';

    // define the HTML Body. (you can refer this from an HTML file too)
    $mail->Body = '<h1>Hello World!</h1> <p>This is my first email!</p>';

    $mail->send(); //send the emailecho 'The email has been sent';
    echo 'Email has been sent successfully';
} catch (Exception $e) {
    echo "We ran into an error while sending the email: {$mail}";
}
?>