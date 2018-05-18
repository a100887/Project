<?php
    session_start();

    require('phpmailer/PHPMailerAutoload.php'); #load the library required for phpmailer
        
    $userEmail = $_SESSION['email'];
    var_dump($userEmail);
        
    $username = 'silvan.vella.a100887@mcast.edu.mt';
    $pwd = 'Mcast177197';
    $emailTo = 'silvan.vella.a100887@mcast.edu.mt';
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
    $mail->Body = 'A new user has registered to the website with the following email: ' . $userEmail;
    $mail->Subject = 'Client Message';
    $mail->From = $username; #sender
    $mail->AddAddress($emailTo); #recepient

    if (!$mail->Send()) #sending the email
        
    {
        echo "Message was not sent";
        echo "Mailer Error: ". $mail->ErrorInfo;
        session_destroy();       
    }
        
    else {
        session_destroy();
        header("Location: registration.php");
    }
?>