<?php
    require($_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php'); #load the library required for phpmailer

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $comments = $_POST['comments'];
    $emailTo = $_POST['emailTo'];
    $mail = new PHPMailer(); #create a new instance
    $mail->isSMTP(); #using SMTP
    $mail->isHtml(true);
    $mail->Host = 'smtp.office365.com';
    #$mail->SMTPDebug = 2; #include client and server messges
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $pwd;
    $mail->Body = $comments;
    $mail->Subject = 'test';
    $mail->From = $username; #sender
    $mail->AddAddress($emailTo); #recepient
    
    if (!$mail->Send()) #sending the email
    {
        echo "Message was not sent";
        echo "Mailer Error: ". $mail->ErrorInfo;
    }
    else
        echo 'Message was sent';
?>