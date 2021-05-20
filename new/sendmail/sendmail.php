<?
require_once('class.phpmailer.php');


// Mailer pandu
// MAIL_DRIVER=smtp
// MAIL_HOST='smtp.mailgun.org'
// MAIL_PORT=587
// MAIL_USERNAME='postmaster@mail.myvios.cloud'
// MAIL_PASSWORD='6d9820f95398e86a7b10945e84a49b1c-e470a504-84fe385d'
// MAIL_ENCRYPTION=tls
// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->SMTPAuth = true;
// $mail->Username = "postmaster@mail.myvios.cloud";
// $mail->Password = "6d9820f95398e86a7b10945e84a49b1c-e470a504-84fe385d";
// $mail->Host     = "smtp.mailgun.org";
// $mail->Port     = "587";

// Mailer Flexiee
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
//$mail->Username = "smtp_void";
//$mail->Password = "cD53oc:oI";
//$mail->Host     = "mailgun120.securesvr.net";
$mail->Username = "smtp.user@voffice.co.id";
$mail->Password = "09X7CnHvRnFKrJJ!51";
$mail->Host     = "server.voffice.co.id";
$mail->Port       = "587";

/*
$mail->SetFrom('infi@evoicemail.net', 'New Order');
$mail->Subject = ('New Message from eVoiceMail');
$mail->MsgHTML('test');
$mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
if($mail->Send()) {
  echo "Message sent!";
} else {
  echo "Mailer Error: " . $mail->ErrorInfo;
}
*/
?>
