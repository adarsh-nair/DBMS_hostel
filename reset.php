<!DOCTYPE HTML>
<?php
session_start();
require_once('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{	
	$id = $_SESSION["id"];
	$pwd = md5(test_input($_POST["pwd"]));
	$repwd = md5(test_input($_POST["repwd"]));
	$verify = 'SELECT `Password`, `Hostelite_ID` FROM `Hostelite` WHERE `Hostelite_ID` = '.$id.';';
	$v_output = $connect->query($verify);
	$v_pass = $v_output->fetch_assoc();
	$v_pwd = $v_pass["Password"];
	$id = $v_pass["Hostelite_ID"];
	if(strcasecmp($pwd,$repwd) == 0)
	{
		if(strcasecmp($pwd, $v_pwd) == 0)
			echo '<script>window.alert("Password is same as previous.")</script>';
		$change = 'UPDATE `Hostelite` SET `Password` = \''.$pwd.'\' WHERE `Hostelite_ID` ='.$id.';';
		if($connect->query($change) === TRUE)
		{
			echo '<script>window.alert("Password updated sucessfully!!")</script>';
		}
		else
			echo '<script>window.alert("Password couldn\'t be updated :(")</script>';
	}
				echo '<script>window.document.location.href="student_first.php"</script>';
}
	?>
<html>
<head>
	<title>Home Away From Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="auto_style.css">
</head>

<body>
	<ul class="nav-ul">
		<li><a href="auto.php">HOME AWAY FROM HOME</a><li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="signup.php">SIGN UP</a></li>
		<li style="float:right"><a href="login.php">LOGIN</a></li>
	</ul>
		<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>RESET PASSWORD</h2>
					</header>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" placeholder="Minimum seven characters" name="pwd" id="pwd" pattern="[a-zA-Z0-9*&%@_]{6,14}">
					</div> 
					<div class="form-group">
						<label for="repwd">Re-enter Password:</label>
						<input type="password" class="form-control" placeholder="Minimum seven characters" name="repwd" id="repwd" pattern="[a-zA-Z0-9*&%@_]{6,14}">
					</div>
					</br>  
				<button type ="submit" style="color:#fff; margin-left: 150px" class="btn-submit">SUBMIT</button>
		  </form>
		</div>
	<footer id="contact" class="container footer-main">
		<center><h3>Come Home to a Home away from Home </h3></center>
		<div class="row" style="padding-top: 5px; padding-bottom:5px;">
			<div class="half">
				<h4 style="padding-left: 450px">
					Postal Address</br></br>
					Vastushree</br>
					Plot No. 56,</br>
					Trimoorti Chowk,</br>
					Katraj, Pune - 39.</br>
				</h4>
			</div>
			<div class="half" style="padding-top: 20px;">					
				<h4> Email-id : query@vastushree.in </h4>
				<h4> Contact No: 9595637720 </h4>
			</div>
		</div>
	</footer>
