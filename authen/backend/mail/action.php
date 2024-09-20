<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../config/database.php';
require '../../../src/PHPMailer.php';
require '../../../src/SMTP.php';
require '../../../src/Exception.php';


if(isset($_POST['front_mail'])){
    $sender_name = $_POST['name'];
    $sender_email = $_POST['email'];
    $sender_body = $_POST['body'];

    if($sender_name && $sender_email && $sender_body){
        $mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mdabirhossain.bd.info@gmail.com';                     //SMTP username
    $mail->Password   = 'tzuhkcvkjhrtjjku';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($mail->Username, 'Md Abir Hossain');
    $mail->addAddress($sender_email,$sender_name);               //Name is optional
    $mail->addReplyTo($mail->Username);
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Welcome to our KUFA world!";
    $mail->Body    = "Your message is- $sender_body";
    

    if($mail->send()){
        $insert_query = "INSERT INTO mails (name,email,body) VALUES ('$sender_name','$sender_email','$sender_body')";
        mysqli_query($dbm,$insert_query);
        $_SESSION['sendmail'] = "Your mail has been sent!";
        header('location:../../index.php#contact');
    }
    
}else{
    $_SESSION['sendingFail'] = "Field is required!";
    header('location:../../index.php#contact');
}
    
}

?>