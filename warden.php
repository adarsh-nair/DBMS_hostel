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
		<li><a href="/Hostel/warden_first.php">HOME AWAY FORM HOME</a></li>  
		<li style="float:right"><a href="/Hostel/logout.php">LOGOUT</a></li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="/Hostel/auto.php">HOME</a></li>
	</ul>
	<div class="sidebar bar-block" style="background-color:#031836;width:15%; height: 230px; position:fixed">
	<center>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Warden/combine_bill.php\' target="_blank" class="bar-item button" style="width: 180px; background-color:#333;">COMBINED BILL</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Warden/in_out.php\' class="bar-item button" style="width: 180px; background-color:#333;">CURRENT STRENGTH</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Warden/visitor.php\' class="bar-item button" style="width: 180px; background-color:#333;">VISITOR</button>';
	?>	
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Warden/night_staff.php\' class="bar-item button" style="width: 180px; background-color:#333;">NIGHT OUT</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'room\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">ROOM ISSUES</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Warden/grievances.php\' class="bar-item button" style="width: 180px; background-color:#333;">GRIEVANCES</button>';
	?>
	</div>
	<div id="room" class="modal">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('room').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Room</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Warden/room.php">
							<div class="form-inline form-group">
								Display:
								<select name="choice" class="form-control">
									<option value='All'>ALL</option>
									<option value='Occupied'>OCCUPIED</option>
									<option value='Empty'>EMPTY</option>
								</select>
								Defects:
								<select name="defects" class="form-control">
									<option value='Carpenter'>Furniture</option>
									<option value='Plumber'>Water</option>
									<option value='Electrician'>Electricity</option>
									<option value='All'>All</option>
								</select>
								<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
				<footer class="container" style="background-color:#0099cc; color:#fff">
						<p style="padding-left:30px;">Furniture includes defects related to windows, door and the bed too.</p>
				</footer>
			</div>
	</div>
