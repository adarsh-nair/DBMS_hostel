<!DOCTYPE HTML>
<?php
require_once('connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$user = test_input($_POST["user"]);
	$pwd = test_input($_POST["pwd"]);
	$verify = 'SELECT `Password` FROM `Staff` WHERE `Username`=\''.$user.'\';';
	$res = $connect->query($verify);
	$v_pwd = $res->fetch_assoc();
	if(strnatcmp($pwd,$v_pwd["Password"]) == 0)
	{
		if($user == 'host1907')
			echo "<script>window.document.location.href = 'staff_first.php';</script>";
		else
			echo "<script>window.document.location.href = '".$user."_first.php';</script>";
		session_start();
		$_SESSION["id"] = $user;
	}
	else
	{
?>
	<script>
		window.alert("Incorrect Username or Password.");
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
		<li style="float:right"><a href="login.php">STUDENT LOGIN</a></li>
	</ul>
		<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>LOGIN</h2>
					</header>
					<div class="form-group">
							<label for="user">Username:</label>
							<input type="text" class="form-control" id="user" name ="user" pattern="[a-zA-Z0-9*&%@_]{6,14}">
					</div>
					<div class="form-group">
							<label for="pwd">Password:</label>
							<input type="password" class="form-control" placeholder="Minimum seven characters" id="pwd" name="pwd" pattern="[a-zA-Z0-9*&%@_]{6,14}">
					</div> 
					</br>  
				<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
		  </form>
		</div>
