<!DOCTYPE HTML>
<?php
require_once('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$eid = test_input($_POST["eid"]);
	$pwd = md5(test_input($_POST["pwd"]));
	$verify = 'SELECT `Password`, `Hostelite_ID` FROM `Hostelite` WHERE `Email_ID` = \''.$eid.'\';';
	$v_output = $connect->query($verify);
	$v_pass = $v_output->fetch_assoc();
	$v_pwd = $v_pass["Password"];
	$id = $v_pass["Hostelite_ID"];
	$default = '827CCB0EEA8A706C4C34A16891F84E7B';
	$date = Date("Y-m-d");
	$fetch = 'SELECT * FROM `Forgot_Password` WHERE `Hostelite_ID`= '.$id.' AND `Date` = \''.$date.'\'';
	$res_fetch = $connect->query($fetch);
	if($res_fetch->num_rows != 0)
	{
		$row = $res_fetch->fetch_assoc();
		if(strcaesmp($pwd,$row['Password']) == 0)
		{
			$delete = 'DELETE FROM `Forgot_Password` WHERE `Hostelite_ID` = '.$id.';';
			$connect->query($delete);
			echo "<script>window.document.location.href='reset.php';</script>";
		}
	}
			
	if(strcasecmp($pwd,$v_pwd) == 0)
	{
		session_start();
		$_SESSION["id"] = $id;
		if(strcasecmp($pwd, $default) == 0)
			echo "<script>window.document.location.href='reset.php';</script>";
		echo "<script>window.document.location.href = 'student_first.php';</script>";
	}
	else
	{
?>
	<script>
		window.alert("Incorrect Email ID or Password.");
	</script>
<?php
	}
}
?>

<html>
<head>
	<title>Automatic sliding</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="auto_style.css">
</head>

<body>
	<ul class="nav-ul">
		<li><a href="auto.php">HOME AWAY FROM HOME</a><li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="signup.php">SIGN UP</a></li>
	</ul>
		<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>LOGIN</h2>
					</header>
					<div class="form-group">
							<label for="eid">Email ID:</label>
							<input type="text" class="form-control" placeholder="example@here.com" id="eid" name="eid" pattern="[A-Za-z0-9._]{5,15}@[a-z]{4,9}.[a-z]{2,4}">
					</div>
					<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" placeholder="Minimum seven characters" id="pwd" name="pwd" pattern="[a-zA-Z0-9*^%@_]{5,21}">
					</div> 
					<p><a href="forgot.php" style="text-decoration: none; font-size: 20px; padding-left: 20px">Forgot password?</a></p>
					</br>  
				<button type ="submit" style="color:#fff; margin-left: 150px" class="btn-submit">SUBMIT</button>
		  </form>
		</div>
