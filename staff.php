<!DOCTYPE html>
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
		<li><a href="/Hostel/auto.php">HOME AWAY FORM HOME</a></li>  
		<li style="float:right"><a href="/Hostel/logout.php">LOGOUT</a></li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="/Hostel/staff_first.php">HOME</a></li>
	</ul>
	<div class="sidebar bar-block" style="background-color:#031836;width:15%; height: 550px; position:fixed">
	<center>
	<?php
		echo '<button onclick="document.getElementById(\'news\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">NEWS</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'login\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">CREATE STUDENT LOGIN</button><br><br>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Staff/student.php\' class="bar-item button" style="width: 180px; background-color:#333;">STUDENT\'S INFO</button><br><br>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'room\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">ROOM ISSUES</button><br><br>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'bill\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">BILLS</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'generate\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">GENERATE BILLS</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'essentials\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">ESSENTIALS</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Staff/canteen.php\' class="bar-item button" style="width: 180px; background-color:#333;">CANTEEN</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'transport\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">TRANSPORTATION</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'vehicle\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">INSERT VEHICLE</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'visitor\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">VISITORS</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'housekeeping\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">HOUSEKEEPING</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'employee\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">INSERT EMPLOYEE</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'grievances\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">GRIEVANCES</button>';
	?>
	</center>
	</div>
		<! ROOM >
		<div id="room" class="modal">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('room').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Room</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Staff/room_staff.php">
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
	<! GENERATE BILLS >
	<div id="generate" class="modal">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('generate').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Generate Bills</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;padding-bottom:10px">
						<form method="post" action="/Hostel/Staff/generate_bill.php">
							<div class="form-inline form-group">
								Month:
								<select name="mth" class="form-control">
									<option value='01'>January</option>
									<option value='02'>February</option>
									<option value='03'>March</option>
									<option value='04'>April</option>
									<option value='05'>May</option>
									<option value='06'>June</option>
									<option value='07'>July</option>
									<option value='08'>August</option>
									<option value='09'>September</option>
									<option value='10'>October</option>
									<option value='11'>November</option>
									<option value='12'>December</option>
								</select>
								</div>
							<div class="form-group">
							Year:
							<input type="text" name = "year" class="form-control" required>
							<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
			</div>
	</div>
	<! ESSENTIALS >
	<div id="essentials" class="modal">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('essentials').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Essentials</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;padding-bottom:10px">
						<form method="post" action="/Hostel/Staff/essentials_staff.php">
							<div class="form-inline form-group">
							Date:
							<input type="date" name = "date" class="form-control" required>
							<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
			</div>
	</div>

	<! BILL >
	<div id="bill" class="modal">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('bill').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Bill</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Staff/bill_staff.php">
							<div class="form-inline form-group">
								Month:
								<select name="mth" class="form-control">
									<option value='01'>January</option>
									<option value='02'>February</option>
									<option value='03'>March</option>
									<option value='04'>April</option>
									<option value='05'>May</option>
									<option value='06'>June</option>
									<option value='07'>July</option>
									<option value='08'>August</option>
									<option value='09'>September</option>
									<option value='10'>October</option>
									<option value='11'>November</option>
									<option value='12'>December</option>
								</select>
								Display:
								<select name="dis_type" class="form-control">
									<option value='Paid'>Paid</option>
									<option value='Unpaid'>Unpaid</option>
									<option value='All'>All</option>
								</select>
								<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
			</div>
	</div>
	<! TRANSPORT >
	<div id="transport" class="modal" >
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('transport').style.display='none'" 
				class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">Select a date</h2>
			</header>
			<div class="container"> 
				<form style="padding-left:20px;" action="/Hostel/Staff/transport_staff.php" method="post">
				Date:<br>
				<input type="date" name="date">
				<br><br>
				<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
				</form>
			</div>
			<footer class="container" style="background-color:#0099cc; color:#fff">
				<p style="padding-left:30px;"></p>
			</footer>
		</div>
	</div>
	<! VECHICLE >
	<div id="vehicle" class="modal" >
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('vehicle').style.display='none'" 
				class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">Insert Vehicle</h2>
			</header>
			<div class="container"> 
				<form style="padding-left:20px;" action="/Hostel/Staff/vehicle_staff.php" method="post">
				<div class="form-group">
					Number Plate:
					<input type="text" name = "plate" class="form-control" required pattern="[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{1,4}">
				</div>
				<div class="form-group">
					Model:
					<input type="text" name = "model" class="form-control" required>
				</div>
				<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
				</form>
			</div>
			<footer class="container" style="background-color:#0099cc; color:#fff">
				<p style="padding-left:30px;"></p>
			</footer>
		</div>
	</div>
	<! VISITOR >
	<div id="visitor" class="modal">
			<div class="modal-content" style="padding-bottom:30px;">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('visitor').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Visitor</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Staff/visitor_staff.php">
							<div class="form-inline form-group">
								Start Date:
								<input type="date" name = "s_date" class="form-control" required>
								End Date:
								<input type="date" name = "e_date" class="form-control" required>
								<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
			</div>
	</div>
	<! NEWS >
	<div id="news" class="modal" style="padding-top: 50px">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('news').style.display='none'" 
					class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">NEWS</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right:30px">
					<form method="post" action="/Hostel/Staff/news.php">
						<div class="form-group" >
						Date:	
						<input type ="date" class="form-control" name="date" required>
						</div>
						<div class="form-group">
						Message:
						<input type ="text" class="form-control" name="msg">
						</div>
						<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 210px">SUBMIT</button>
					</form>
				</div>
				<footer class="container" style="background-color:#0099cc; color:#fff">
					<p style="padding-left:30px;">You may set the message of today or any future day.</p>
				</footer>
			</div>
	</div>
	<! GRIEVANCES >
	<div id="grievances" class="modal">
			<div class="modal-content" style="padding-bottom:30px;">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('grievances').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Grievances</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Staff/grievances.php">
							<div class="form-inline form-group">
								Start Date:
								<input type="date" name = "s_date" class="form-control" required>
								End Date:
								<input type="date" name = "e_date" class="form-control" required>
								<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
			</div>
	</div>
	<! HOUSEKEEPING >
	<div id="housekeeping" class="modal">
			<div class="modal-content" style="padding-bottom:30px;">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('housekeeping').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Housekeeping</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Staff/housekeeping.php">
							<div class="form-inline form-group">
								Start Date:
								<input type="date" name = "s_date" class="form-control" required>
								End Date:
								<input type="date" name = "e_date" class="form-control" required>
								<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
			</div>
	</div>
	<! EMPLOYEE >
	<div id="employee" class="modal">
			<div class="modal-content" style="padding-bottom:30px;">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('employee').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Insert Employee</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Staff/employee.php">
							<div class="form-group">
								Name:
								<input type="text" name = "name" class="form-control" required>
							</div>
							<div class="form-group">
								Contact:
								<input type="text" name = "contact" class="form-control" pattern="[789]{1}[0-9]{9}" required>
							</div>
							<div class="form-group">
								Time:
								<select name = "time" class="form-control">
									<option value='14:30'>14:30</option>
									<option value='15:00'>15:00</option>
									<option value='15:30'>15:30</option>
									<option value='16:00'>16:00</option>
								</select>
							</div>
								<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
							</div>
						</form>
				</div>
			</div>
	</div>
	<! LOGIN >
	<div id="login" class="modal" style="padding-top: 50px">
			<div class="modal-content">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('login').style.display='none'" 
					class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">CREATE STUDENT LOGIN</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right:30px">
					<form method="post" action="/Hostel/Staff/insert_stud.php">
						<div class="form-group">
						Email_ID:
						<input type ="text" class="form-control" name="eid" pattern = "[A-Za-z0-9._]{5,15}@[a-z]{4,9}.[a-z]{2,4}" required>
						</div>
						<div class="form-group">
						Name:
						<input type ="text" class="form-control" name="name" required>
						</div>
						<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 210px">SUBMIT</button>
					</form>
				</div>
			</div>
	</div>
</body>
</html>
