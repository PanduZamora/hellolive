<?
require_once('class.phpmailer.php');
// Mailer
$mail = new PHPMailer();				
$mail->IsSMTP();					
$mail->SMTPAuth = true; 
$mail->Username = "qwerty"; 
$mail->Password = "oZ.G31uzaaGIU"; 
$mail->SMTPDebug = 2;
$mail->Host     = "mailgun120.securesvr.net";
$mail->Port       = "587";

echo "<pre>";


$mail->SetFrom('contact@voffice.co.id', 'CS');
$mail->Subject = ('New Message from vOffice.co.id');
$mail->MsgHTML('test');
$mail->AddAddress('Javad@flexiesolutions.com', 'Javad');
$mail->AddAddress('cs@voffice.co.id', 'Customer Service');
$mail->AddAddress('kevin@cre8.id');
if($mail->Send()) {
 				 echo "Message sent!";
				} else {
  					echo "Mailer Error: " . $mail->ErrorInfo;
					}

?>
