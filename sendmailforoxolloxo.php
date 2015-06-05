<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
function wadiemail($to,$sub,$msg,$from){
	//Global $_GET['lang'];
	//echo $_GET['lang'];
	require_once('../refv3module/w3-global/default/assets/w3lib/class.phpmailer.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->CharSet = 'UTF-8';
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.mandrillapp.com";
	$mail->Port = 465;
	$mail->IsHTML(true);
	$mail->Username = "webdeveloper@kpaapl.com";
	$mail->Password = "0ppZnklY1L-6wUUFtP8jYQ";
	$mail->SetFrom($from,'oxolloxo');
	$mail->Subject = $sub;
	$mail->Body = $msg;
	$mail->AddAddress($to);
	return $mail->Send() ? '1' : '0';
}
if(isset($_GET['otp']) && isset($_GET['email'])){
	if($_GET['lang'] == 'arabic'){
		echo wadiemail($_GET['email'],'تأكيد عنوان البريد الإلكتروني الخاص بك',
			'<!DOCTYPE html>
			<html lang="ar">
			<head>
			<meta charset="utf-8">
			</head>
			<body>
			ادخل رمز الكود الموضح أدناه لتأكيد البريد الألكتروني الخاص بك:<br /><br /> '.$_GET['otp'].'<br /><br />
			تقبلوا وافر التحية,<br />
			فريق وادي
			</body>
			</html>'
			,'noreply@oxolloxo.com'
		);
	}
	else{
		echo wadiemail($_GET['email'],'Verify your email address',
			'<!DOCTYPE html>
			<html>
			<body>
			Enter the code given below to verify your email address:<br /><br /> '.$_GET['otp'].'<br /><br />
			Regards, <br />
			Team - Oxolloxo
			</body>
			</html>'
			,'noreply@oxolloxo.com'
		);
	}
}
?>