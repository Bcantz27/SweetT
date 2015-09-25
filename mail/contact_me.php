<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
print
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

require_once('../lib/PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'specscape1@gmail.com';                 // SMTP username
$mail->Password = '22penn27';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->From = 'mailer@trevanmcclure.com';
$mail->FromName = 'mailer';
$mail->addAddress('specscape1@gmail.com');     // Add a recipient
$mail->isHTML(true);
$mail->Subject = 'New Message from website contact form!';
$mail->Body    = "<p>You have recieved a new message on your website.</p>
                  <p><strong>Name: </strong> {$name} </p>
                  <p><strong>Email Address: </strong> {$email_address} </p>
                  <p><strong>Message: </strong> {$message} </p>";

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

return true;
?>
