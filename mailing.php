<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once('Mail/Exception.php');
	require_once('Mail/PHPMailer.php');
	require_once('Mail/SMTP.php');
	require_once('connect.php');
	require_once('otp.php');
	function mailing($eid)
	{		
		$otp = otp(6);
		$mail = new PHPMailer(true); 
		$mail->isSMTP();                                    // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  										// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                             // Enable SMTP authentication
		$mail->Username = 'hostel.management17@gmail.com';  // SMTP username
		$mail->Password = 'hostel1907';                     // SMTP password
		$mail->SMTPSecure = 'tls';                         	// Enable TLS encryption, `ssl` also accepted
		$mail->Port = "587";
																												//Recipients
		$mail->setFrom('hostel.management17@gmail.com', 'Hostel');
		$mail->addAddress($eid);
																												//Content
		$mail->WordWrap = 50;	    		
		$mail->isHTML(true);                               	// Set email format to HTML
		$mail->Subject = 'Mail Verification';
		$mail->Body    = 'Welcome to Vastushree.\n Your verification code is: '.$otp.'.';
		$mail->AltBody = 'Welcome to Vastushree.\n Your verification code is: '.$otp.'.';
		$mail->send();
		return $otp;
	}
?>
