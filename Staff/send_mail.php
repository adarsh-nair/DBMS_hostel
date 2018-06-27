<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once('../Mail/Exception.php');
	require_once('../Mail/PHPMailer.php');
	require_once('../Mail/SMTP.php');

	function send($eid, $name, $id)
	{
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
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
		$mail->Subject = 'Sign up Information';
		$mail->Body    = 'Hey '.$name.'! Your Hostelite ID is '.$id.'.';
		$mail->AltBody = 'Hey '.$name.'! Your Hostelite ID is '.$id.'.';
		if($mail->send())
			echo '<script>window.alert(\'Mail sent sucessfully to hostelite id: '.$id.'\')</script>';
		else
			echo '<script>window.alert(\'Mail unsucessfully to hostelite id: '.$id.'\')</script>';
	}
?>
