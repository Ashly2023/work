<?php
require_once('class.phpmailer.php');


$firstname = $_POST['name'];
$email = $_POST['email'];

// $captcha=$_POST['g-recaptcha-response'];
//  if(!$captcha){
//           echo '<h2>Please check the the captcha form.</h2>';
//           exit;
//         }


$template = '<div style="padding:50px;">Hi,<br/>'
. '<br/>We have a contact message from ' . $firstname . ' <br/><br/>'
. '<br/><div style="font-family:Tahoma, Geneva, sans-serif; font-size:13px; color: #666; padding:10px; border-radius:8px; box-shadow:0px 0px 10px #e1e1e1; max-width:500px; border: 5px solid #efefef"><h3 style="margin: 0px;padding: 6px 0 4px 1px;color: #084884;text-transform: uppercase;font-weight: normal;font-size: 19px;border-bottom: 1px dashed #ddd;margin-bottom: 10px;">GET A QUOTES FORM DETAILS</h3>'
. '<table width="100%" cellspacing="0" cellpadding="10" border="0"><tr><td width="19%" style="background: #fafafa; border-bottom: 1px solid #f3f3f3; color:#000;">First Name</td><td width="2%" style="background: #fafafa;  border-bottom: 1px solid #f3f3f3;">:</td><td width="79%" style="background: #fafafa;  border-bottom: 1px solid #f3f3f3;">' . $firstname . '</td></tr>'
. '<tr><td width="19%" style="background: #fafafa; border-bottom: 1px solid #f3f3f3; color:#000;">Email</td><td width="2%" style="background: #fafafa;  border-bottom: 1px solid #f3f3f3;">:</td><td width="79%" style="background: #fafafa;  border-bottom: 1px solid #f3f3f3;">' . $email . '</td></tr></table></div>';


$sendmessage = "<div>" . $template . "</div>";
$sendmessage = wordwrap($sendmessage, 70);
$mail = new PHPMailer(); 
$mail->IsMail();
$mail->IsHTML(true);
$mail->SetFrom('noreply@ascendantdigital.io','Contact Form');
$mail->AddReplyTo($email,$firstname);
$mail->Subject = "Ascendant digital Contact Form Details";
$mail->Body = $sendmessage;


 
$mail->AddAddress('shanipenta@gmail.com');

if( $mail->Send() ){
    echo "<font color='green'>Your Message successfully sent, We will contact you soon.!</font>";
 }else{
     echo "Mail was not sent. Please try again later.";
	  //echo "Mailer Error: " . $mail->ErrorInfo;
 }
?>