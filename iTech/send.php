<?php
    session_start();

    require('phpmailer/PHPMailerAutoload.php'); #load the library required for phpmailer

    if (isset($_POST['contactSubmit'])) {
        
        $clientName = $_POST['contactName'];
        $clientEmail = $_POST['contactEmail'];

        $username = 'silvan.vella.a100887@mcast.edu.mt';
        $pwd = 'Mcast177197';
        $message = $_POST['contactMessage'];
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
        $mail->Body = $clientName . ' (' . $clientEmail . ') sent the following message: <br><br>' . $message;
        $mail->Subject = 'Client Message';
        $mail->From = $username; #sender
        $mail->AddAddress($emailTo); #recepient

        if (!$mail->Send()) #sending the email
        {
            echo "Message was not sent";
            echo "Mailer Error: ". $mail->ErrorInfo;
        }
        else
            echo 'Message was sent';
            header("Location: contact.php");
    }
    
?>