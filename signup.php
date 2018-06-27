<!DOCTYPE HTML>
<?php
	require_once('connect.php');
	require_once('mailing.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = test_input($_POST["id"]);
	$nm = test_input($_POST["nm"]);
	$college = test_input($_POST["college"]);
	$roll = test_input($_POST["roll"]);
	$adh = test_input($_POST["adh"]);
	$add = test_input($_POST["add"]);
	$fn = test_input($_POST["fn"]);
	$mn = test_input($_POST["mn"]);
	$rn = test_input($_POST["rn"]);
	$date = test_input($_POST["date"]);
	$today = Date("Y-m-d");
	$con = test_input($_POST["con"]);
	$fcon = test_input($_POST["fcon"]);
	$mcon = test_input($_POST["mcon"]);
	$eid = test_input($_POST["eid"]);
	$pwd = test_input($_POST["pwd"]);
	$repwd = test_input($_POST["repwd"]);
	$buffer_check = 'SELECT * FROM `Buffer` WHERE `Name`=\''.$nm.'\' AND `Hostelite_ID` = '.$id.' AND `Email_ID`=\''.$eid.'\';';
	$res_buffer = $connect->query($buffer_check);
	if($res_buffer->num_rows)
	{
		$check = 'SELECT `Hostelite_ID` FROM `Hostelite` WHERE `Name`=\''.$nm.'\' AND `Contact` = '.$con.' ;';
		$res_check = $connect->query($check);
		if($res_check->num_rows)
		{
			echo '<script>window.alert(\'Not permitted. Login already exists!\')</script>';
			echo '<script>window.document.location.href=\'/Hostel/login.php\'</script>';
		}
		else
		{
			if(strnatcmp($pwd, $repwd) == 0)
			{	
				$drop = 'DELETE FROM `Buffer` WHERE `Hostelite_ID`='.$id.';';
				$connect->query($drop);
				$otp = mailing($eid);
				echo '<script>window.alert(\'Mail has been sent to the registered Email ID\')</script>';
				$insert = 'INSERT INTO `Buffer`(`Hostelite_ID`, `Room_No`,`Date_move`, `Name`, `DOB`, `Contact`, `Address`, `Email_ID`, `Fname`, `Fcontact`, `Password`, `Mname`, `Mcontact`, `College_Name`, `Roll_No`, `Adhaar`) VALUES ('.$id.','.$rn.',\''.$today.'\',"'.$nm.'",\''.$date.'\','.$con.',\''.$add.'\',"'.$eid.'","'.$fn.'",'.$fcon.',"'.md5($pwd).'",\''.$mn.'\',\''.$mcon.'\',\''.$college.'\',\''.$roll.'\',\''.$adh.'\');';
				echo $insert;
				session_start();
				$_SESSION['id'] = $id;
				$_SESSION['otp'] = $otp;
				$connect->query($insert);	
				echo '<script>window.document.location.href="/Hostel/verify.php"</script>';
			}
			else
			{
		?>
			<script>
				window.alert("The passwords entered didn't match");
			</script>
		<?php
			}
		}	
	}
	else
	{
		echo '<script>window.alert(\'Invalid Hostelite ID\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/auto.php\'</script>';
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
	<ul class="nav-ul">
		<li><a href="auto.php">HOME AWAY FROM HOME</a><li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="login.php">LOGIN</a></li>
	</ul>
		<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>SIGNUP</h2>
					</header>
					<div class="form-group">
						<label for "id">Hostelite ID:</label>
						<input type = "text" class="form-control" id = "id" name = "id" pattern="{4}" required>
					</div>
					<div class="form-group">
            <label for="nm">Name:</label>
            <input type="text" class="form-control" id="nm" name="nm" required>
		      </div>
					<div class="form-group">
		         <label for="rn">Room Number:</label>
		         <input type="text" class="form-control" id="rn" name="rn" pattern="[0-7][0-1][0-9]">
		      </div>
					<div class="form-group">
            <label for="college">College Name:</label>
            <input type="text" class="form-control" id="college" name="college" required>
		      </div>
					<div class="form-group">
            <label for="roll">Roll Number:</label>
            <input type="text" class="form-control" id="roll" name="roll" required>
		      </div>
					<div class="form-group">
            <label for="adh">Adhaar:</label>
            <input type="text" class="form-control" id="adh" name="adh" required>
		      </div>
					<div class="form-group">
							Address:
						<input type="text" class="form-control" id ="add" name="add" required>
					</div>
		      <div class="form-group">
		         <label for="fn">Father's Name:</label>
		         <input type="text" class="form-control" id="fn" name= "fn">
		      </div>
					 <div class="form-group">
		         <label for="mn">Mother's Name:</label>
		         <input type="text" class="form-control" id="mn" name= "mn">
		      </div>
		      <div class="form-group">
		         <label for="ln">Date of Birth:</label>
		         <input type="date" name="date" class="form-control">
		      </div>
					<div class="form-group">
             <label>Contact details:</label>
             <input type="tel" placeholder="Ten digit number"  name="con" maxlength="10" pattern="[789]{1}[0-9]{9}" class="form-control">
          </div>
					<div class="form-group">
             <label>Father's Contact details:</label>
             <input type="tel" placeholder="Ten digit number"  name="fcon" maxlength="10" pattern="[789]{1}[0-9]{9}" class="form-control">
          </div>
					<div class="form-group">
             <label>Mother's Contact details:</label>
             <input type="tel" placeholder="Ten digit number"  name="mcon" maxlength="10" pattern="[789]{1}[0-9]{9}" class="form-control">
          </div>
					<div class="form-group">
						<label for="eid">Email ID:</label>
						<input type="text" class="form-control" placeholder="example@here.com" name="eid" id="eid" pattern="[A-Za-z0-9._]{5,15}@[a-z]{4,9}.[a-z]{2,4}">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" placeholder="Minimum seven characters" name="pwd" id="pwd" pattern="[a-zA-Z0-9*&%@_]{6,14}">
					</div> 
					<div class="form-group">
						<label for="repwd">Re-enter Password:</label>
						<input type="password" class="form-control" placeholder="Minimum seven characters" name="repwd" id="repwd" pattern="[a-zA-Z0-9*&%@_]{6,14}">
					</div> 
					</br>  
				<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
		  </form>
		</div>
	</BODY>
</HTML>
