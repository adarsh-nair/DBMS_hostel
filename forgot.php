<!DOCTYPE HTML>
<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once('Mail/Exception.php');
	require_once('Mail/PHPMailer.php');
	require_once('Mail/SMTP.php');
	require_once('connect.php');
	require_once('otp.php');
?>
<HTML>
<HEAD>
	<TITLE>Reset Password</TITLE>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="auto_style.css">
</HEAD>

<BODY>
	<ul>
		<li><a href="auto.php">HOME AWAY FROM HOME</a><li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="login.php">LOGIN</a></li>
	</ul>
	<?php
		if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['email']))
		{
			$date = Date("Y-m-d");
			date_default_timezone_set('Asia/Kolkata');
			$time  = date("h:i:s");
			$id = $_POST["id"];
			$email = test_input($_POST["email"]);
			$check = 'SELECT `Email_ID` FROM `Hostelite` WHERE `Hostelite_ID`	= '.$id.';';	
			$res_check = $connect->query($check);
			$fetch_check = $res_check->fetch_assoc();
			$check = $fetch_check["Email_ID"];
			if(strnatcmp($email,$check) == 0)
			{
				$otp = otp(8);
				$pwd = md5($otp);
				$insert = 'INSERT INTO `Forgot_Password` VALUES('.$id.',\''.$check.'\',\''.$pwd.'\',\''.$date.'\',\''.$time.'\');';
				$connect->query($insert);
				//$update = 'UPDATE `Hostelite` SET `Password` = \''.$pwd.'\' WHERE `Hostelite_ID` = '.$id.';';
				//$connect->query($update);
				$mail = new PHPMailer(true); 
				$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'smtp.gmail.com';  										// Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                             // Enable SMTP authentication
					$mail->Username = 'hostel.management17@gmail.com';  // SMTP username
					$mail->Password = 'hostel1907';                     // SMTP password
					$mail->SMTPSecure = 'tls';                         	// Enable TLS encryption, `ssl` also accepted
					$mail->Port = "587";
																															//Recipients
					$mail->setFrom('hostel.management17@gmail.com', 'Hostel');
					$mail->addAddress($check);
																															//Content
					$mail->WordWrap = 50;	    		
					$mail->isHTML(true);                               	// Set email format to HTML
					$mail->Subject = 'Reset Password';
					$mail->Body    = 'Your password has be reset to '.$pwd.'.';
					$mail->AltBody = 'Your password has be reset to '.$pwd.'.';
					$mail->send();
					echo '<script>window.alert(\'Mail has been sent to the registered Email ID\')</script>';
			}
			else
				echo "<script>window.alert(\'Incorrect Hostelite ID or Email ID\')</script>";
		}
	?>
		<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>FORGOT PASSWORD</h2>
					</header>
					<div class="form-group">
						Hostelite ID:
						<input type="text" class="form-control" name ="id" pattern="[0-9]{4}">
					</div>
					<div class="form-group">
						Email ID:
						<input type="text" class="form-control" placeholder="Registered Email ID" name="email" pattern="[A-Za-z0-9._]{5,15}@[a-z]{4,9}.[a-z]{2,4}">
					</div>
					</br>  
				<button type ="submit" style="color:#fff; margin-left: 150px" class="btn-submit">SUBMIT</button>
		  </form>
		</div>
</BODY>
</HTML>
