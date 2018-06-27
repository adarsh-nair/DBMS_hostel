<?php
	require_once('connect.php');
?>

<html>
<title>Home away from Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/Hostel/auto_style.css">

<body>
<!Navigation Bar>
	<ul class="nav-ul">
		<li><a href="/Hostel/maintenance.php">HOME AWAY FORM HOME</a></li>  
		<li style="float:right"><a href="/Hostel/logout.php">LOGOUT</a></li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="/Hostel/auto.php">HOME</a></li>
	</ul>
	<div class="sidebar bar-block" style="background-color:#031836;width:15%; height: 120px; position:fixed">
	<center>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Maintenance/furni.php\' class="bar-item button" style="width: 180px; background-color:#333;">FURNITURE</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Maintenance/elec.php\' class="bar-item button" style="width: 180px; background-color:#333;">ELECTRICITY</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Maintenance/water.php\' class="bar-item button" style="width: 180px; background-color:#333;">WATER</button>';
	?>
	</div>
