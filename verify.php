<?php
	session_start();
	require_once('connect.php');
	require_once('mailing.php');
	$id = $_SESSION['id'];
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$otp_verify = $_SESSION['otp'];
		$otp = $_POST["otp"];
		$select = 'SELECT * FROM `Buffer` WHERE `Hostelite_ID`='.$id.';';
			$res = $connect->query($select);
			$fetch = $res->fetch_assoc();
		if($otp == $otp_verify)
		{
			$insert = 'INSERT INTO `Hostelite`(`Hostelite_ID`, `Room_No`, `Date_move`, `Name`, `DOB`, `Contact`,`Address`, `Email_ID`, `Fname`, `Fcontact`, `Password`, `Mname`, `Mcontact`, `College_Name`, `Roll_No`, `Adhaar`) VALUES ('.$fetch['Hostelite_ID'].','.$fetch['Room_No'].',\''.$fetch['Date_move'].'\',"'.$fetch['Name'].'",\''.$fetch['DOB'].'\','.$fetch['Contact'].',\''.$fetch['Address'].'\',"'.$fetch['Email_ID'].'","'.$fetch['Fname'].'",'.$fetch['Fcontact'].',"'.$fetch['Password'].'",\''.$fetch['Mname'].'\',\''.$fetch['Mcontact'].'\',\''.$fetch['College_Name'].'\',\''.$fetch['Roll_No'].'\',\''.$fetch['Adhaar'].'\');';
			$connect->query($insert);
			$room = 'INSERT INTO `Room` VALUES('.$fetch['Room_No'].',\'N\',\'N\',\'N\',\'N\',\'N\',\'Y\',\''.$fetch['Date_move'].'\',\'0000-00-00\')';
			$connect->query($room);
			$msg = 'INSERT INTO `Message_stud`(`Hostelite_ID`, `Sender`, `Date`, `Msg`) VALUES('.$fetch["Hostelite_ID"].',\'Admin\',\''.$fetch['Date_move'].'\',\'Please update your card details.\')';
			$connect->query($msg);
			echo '<script>window.alert(\'Login created sucessfully\')</script>';
			echo '<script>window.document.location.href="/Hostel/login.php"</script>';
		}
		else
		{
			$otp = mailing($fetch['Email_ID']);
			$_SESSION['otp'] = $otp;
			echo '<script>window.alert(\'Incorrect OTP. A new one has been generated.\')</script>';
			echo '<script>window.document.location.href="/Hostel/verify.php"</script>';
		}
	}
?>

<HTML>
<HEAD>
	<TITLE>HOME AWAY FROM HOME</TITLE>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="auto_style.css">
</HEAD>

<BODY>
	<ul>
		<li><a href="auto.php">HOME AWAY FROM HOME</a><li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="login.php">LOGIN</a></li>
	</ul>
		<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>VERIFY</h2>
					</header>
					<br>
					<h2>Hostelite ID: <?php echo $id; ?></h2>
					<div class="form-group">
						OTP:
						<input class="form-control" type="text" name="otp" required>
					</div>
					<br>
					<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
				</form>
			</div>
</BODY>
</HTML>
