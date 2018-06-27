<!DOCTYPE HTML>
<?php
$connect = new mysqli("localhost", "root", "", "Hostel4") or die(mysqli_error($con));
function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = test_input($_POST["id"]);
	$fdate = test_input($_POST["fdate"]);
	$tdate= test_input($_POST["tdate"]);
	$reason= test_input($_POST["reason"]);
	$g_name = test_input($_POST["g_name"]);
	$relatn= test_input($_POST["relatn"]);
	$con = test_input($_POST["con"]);
	
		
     $insert = 'INSERT INTO `Night_Out`(`Hostelite_ID`, `Date_start`, `Date_end`, `Reason`, `Gaurdian_Name`, `G_Relation`, `G_Contact`) VALUES ('.$id.',\''.$fdate.'\', \''.$tdate.'\' , "'.$reason.'" ,"'.$g_name.'","'.$relatn.'",'.$con.');';
      
		if ($connect->query($insert) === TRUE) 
		{
?>
	<script>
		window.alert("Form submitted successfully");
	</script>
<?php
		}
	  else 
		{
?>
	<script>
    	window.alert("Submission failed!");
	</script>
<?php
		}
		}
	
?>
<html>
<head>
	<title>HOME AWAY FROM HOME</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="auto_style.css">
</head>

<body>
	<ul>
		<li><a href="auto.html">HOME AWAY FROM HOME</a><li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="login.html">LOGIN</a></li>
	</ul>
		<div class="col-lg-offset-4 col-lg-4" style="padding-top: 50px; padding-bottom: 50px;">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<header class="form-header">
						<h2>NIGHT OUT FORM</h2>
					</header>
					<div class="form-group">
						<label for="id">Hostelite ID:</label>
						<input type = "text" class="form-control" id = "id" name = "id" pattern="{4}" required>
					</div>
					<div class="form-group">
		         			<label for="from">From Date:</label>
		         			<input type="date" name="fdate" class="form-control">
		     			 </div>
		                        <div class="form-group">
						 <label for="till">Till Date:</label>
						 <input type="date" name="tdate" class="form-control">
				       </div>
					
					<div class="form-group">
						<label for="rea">Reason:</label>
						<input type="text" class="form-control" placeholder="Type your text here..." name="reason" >
					</div>
					<div class="form-group">
						<label for="gnm">Guardian Name:</label>
						<input type="text" class="form-control"  name="g_name" >
					</div>
					<div class="form-group">
						<label for="rel">Relationship:</label>
						<input type="text" class="form-control" name="relatn" >
					</div>
					<div class="form-group">
					     <label>Guardian Contact:</label>
			<input type="tel" placeholder="Ten digit number"  name="con" maxlength="10" pattern="[789]{1}[0-9]{9}" class="form-control">
					  </div>
					</br>  
				<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
		  </form>
		</div>
	</body>
</html>
