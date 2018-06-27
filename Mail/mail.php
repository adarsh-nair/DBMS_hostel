<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once('Exception.php');
	require_once('PHPMailer.php');
	require_once('SMTP.php');

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
    		//Server settings
    		$mail->isSMTP();                                      // Set mailer to use SMTP
    		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    		$mail->SMTPAuth = true;                               // Enable SMTP authentication
    		$mail->Username = 'hostel.management17@gmail.com';                 // SMTP username
    		$mail->Password = 'hostel1907';                           // SMTP password
    		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = "587";

    		//Recipients
    		$mail->setFrom('apoorva19.am@gmail.com', 'Hostel');
    		$mail->addAddress('apoorva19.am@gmail.com');

    		//Content
		$mail->WordWrap = 50;	    		
		$mail->isHTML(true);                                  // Set email format to HTML
    		$mail->Subject = 'Here is the subject';
    		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    		$mail->send();
    		echo 'Message has been sent';
	} catch (Exception $e) {
    		echo 'Message could not be sent.';
   	 	echo 'Mailer Error: ' . $mail->ErrorInfo;
	}
?>
