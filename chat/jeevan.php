<html>

<head> Confirmation </head>
<body> Please open your email to activate your account </body>
</html>



<?php
require '/var/www/html/chat/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 2;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'connecticoniitp@gmail.com';                 // SMTP username
$mail->Password = 'connecticon';                           // SMTP password
                            // Enable TLS encryption, `ssl` also accepted
                                    // TCP port to connect to
$mail->SMTPSecure = 'tls';
$mail->Port = 25;
$mail->setFrom('connecticon@iitp.ac.in', 'Connecticon');
$address = $_POST['email'];
$mail->addAddress('maddu.cs14@iitp.ac.in');     // Add a recipient               // Name is optional



                             // Set email format to HTML

$mail->Subject = 'Connecticon Verification';
$message = 'Click here to verify your account';
$message.= '<html><body>';
$activation = $_POST['email'];
$activation = md5($activation.time());
$message.= "<a href='http://127.0.0.1/confirm.php?activate=$activation'>Click here to activate</a>";
$message.='</body></html>';
$mail->Body    = $message;


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
