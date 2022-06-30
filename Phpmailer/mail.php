<?php
use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);
$mail->isSMTP();                                   
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'pk8006922@gmail.com';               
$mail->Password = 'asdf@123';                          
$mail->SMTPSecure = 'ssl';//'tls';                           
$mail->Port = 465;//587; 
$mail->setFrom('pk8006922@gmail.com', 'RH Entertainment');
$mail->addReplyTo('pk8006922@gmail.com','RH Enterrainment - Support');
$mail->isHTML(true);



?>