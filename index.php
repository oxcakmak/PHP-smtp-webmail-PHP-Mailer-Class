<?php
/*
Author: Osman Çakmak
Skype: oxcakmak
Email: oxcakmak@hotmail.com
Website: http://oxcakmak.com/
Country: Turkey [TR]
*/
require_once('config.php');
require_once('class.phpmailer.php');
$mail = new PHPMailer();
$mail->Host = $config["mail"]["type"].".".$config['mail']['site'];
$mail->SMTPAuth = true;
$mail->Username = $config['mail']['sender'];
$mail->Password = $config['mail']['password'];
$mail->Port = 587;
$mail->IsSMTP();
$mail->IsHTML(true);
/*
[Change "$user_email" to your own code]
[Mail to send addresses]
[-]For example:
[-+-] Print in a loop (Foreach / For / While)

[code]
$mail->AddAddress($user_email);
[/code]
*/
$mail->AddAddress($user_email); //Change
$mail->From = $config['mail']['sender'];
$mail->FromName = $lstr['ls_label_title_mail_password_reset_request'];
$mail->CharSet = $config['mail']['charset'];
$mail->Subject = $config['meta']['stuck'];
/*
[Your message template]
*/
$mailContent = 'Hello world';
$mail->MsgHTML($mailContent);
if($mail->Send()) {
/*
[Success Then]
*/
    echo "success";
}else{
/*
[Failed Then]
*/
    echo $mail->ErrorInfo."<br>";
    echo "failed";
}
?>
