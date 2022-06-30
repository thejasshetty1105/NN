<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../Phpmailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();
$body= '';
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'social@candidvows.com';                     //SMTP username
    $mail->Password   = 'Test@123';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('social@candidvows.com');
    $mail->addAddress($_POST['email']);     //Add a recipient
    // $mail->addAddress('thejas.s.shetty@gmail.com');           //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                        //Set email format to HTML
        $mail->Subject = 'Thank you for your input '.$_POST['name'];
        $mail->Body    = "We will reach out to you as soon as possible!";
        
    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


$mail1 = new PHPMailer(true);
$body= '';
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail1->isSMTP();                                            //Send using SMTP
    $mail1->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail1->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail1->Username   = 'social@candidvows.com';                     //SMTP username
    $mail1->Password   = 'Test@123';                               //SMTP password
    $mail1->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail1->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail1->setFrom('social@candidvows.com');
    $mail1->addAddress('thejas.s.shetty@gmail.com');     //Add a recipient
    // $mail->addAddress('thejas.s.shetty@gmail.com');           //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail1->isHTML(true);                        //Set email format to HTML
        $mail1->Subject = 'New Entry!';
        $mail1->Body = 'New Entry';
        
    $mail1->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail1->ErrorInfo}";
}

    $server="5.181.218.118";
    $user="u199615871_candidvows";
    $password="cAndidvows@8155";
    $dbname="u199615871_candidvows";

    $conn = new mysqli($server,$user,$password,$dbname);
  
    if($conn->connect_error){
        die("Connection failed: ".$conn->connect_error);
    }

    $sql= "INSERT INTO cont_form(Name,Phone, Email ,Message) VALUES ('$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[message]')";

    if($conn->query($sql)===TRUE){
        header("refresh:1;url=../contact.html");
        echo "<script>
               alert('Thank you for the Feedback!');
            </script>";
        
    }else{
        echo "Error".$conn->error;
    }
    $conn->close();
?>