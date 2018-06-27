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
		<li style="float:right"><a href="/Hostel/student_first.php">HOME</a></li>
	</ul>
		<div class="sidebar bar-block"style="width:180px;background-color:#031836; height: 530px; padding-left:8px;  position:fixed">
		<?php
		echo '<button onclick="window.document.location.href=\'/Hostel/Student/profile.php\'" class="bar-item button" style="width: 180px; background-color:#333;">PROFILE</button><br><br>';
		?>
		<?php
		echo '<button onclick="window.document.location.href=\'/Hostel/Student/medical.php\'" class="bar-item button" style="width: 180px; background-color:#333;">MEDICAL REPORT</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'room\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">ROOM ISSUES</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'canteen\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">CANTEEN</button><br><br>';
		?>
		<?php
		echo '<button onclick="window.document.location.href=\'/Hostel/Student/wishlist.php\'" class="bar-item button" style="width: 180px; background-color:#333;">FOOD WISH LIST</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'laundry\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">LAUNDRY</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'bill\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">BILLS</button><br><br>';
		?>
		<?php
		echo '<button onclick="window.document.location.href=\'/Hostel/Student/payment.php\'" class="bar-item button" style="width: 180px; background-color:#333;">BILL PAYMENT</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'transport\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">TRANSPORTATION</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'essentials\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">ESSENTIALS</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'visitor\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;" action="/visitor.php">VISITORS</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'night\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">NIGHT OUT</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'cleaning\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">HOUSEKEEPING</button><br><br>';
		?>
		<?php
		echo '<button onclick="document.getElementById(\'grievances\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">GRIEVANCES</button><br><br>';
		?>
		</div>
		<! ROOM >
		<div id="room" class="modal" style="padding-top:150px">
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('room').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">Issues</h2>
			</header>
			<div class="container"style="padding-left:30px; margin-right: 30px;">
				<form method="post" action="/Hostel/Student/room.php">
					<div class="form-group">
						<input type="checkbox" name="defect[]" class="form-control" value="Win_doors" style="height:20px">Windows and Door<br>
						<input type="checkbox" name="defect[]" class="form-control" value="Water" style="height:20px">Water<br>
						<input type="checkbox" name="defect[]" class="form-control" value="Electricity" style="height:20px">Electricity<br>
						<input type="checkbox" name="defect[]" class="form-control" value="Furniture" style="height:20px">Furniture<br>
						<input type="checkbox" name="defect[]" class="form-control" value="Bed" style="height:20px">Bed<br>
						<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
					</div>
				</form>
			</div>
			<footer class="container" style="background-color:#0099cc; color:#fff">
						<p style="padding-left:30px;">We will address your problems as soon as possible.</p>
					</footer>
		</div>
	</div>
	<! CANTEEN>
	<div id="canteen" class="modal" >
				<div class="modal-content">
					<header class="container" style="background-color:#0099cc"> 
						<span onclick="document.getElementById('canteen').style.display='none'" 
						class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
						<h2 style="padding-left:30px; color: #fff">Pick Your Meals!</h2>
					</header>
					<div class="container"> 
						<form  style="padding-left:20px;" action="/Hostel/Student/canteen.php" method="post">
						<div class="from-group">
							Please tick your choice:<br>
							<input type="hidden" name="Lunch" value="0" ><br>
							<input type="checkbox" name="Lunch" value="1" >Lunch<br>
							<input type="hidden" name="Dinner" value="0" ><br>
								<input type="checkbox" name="Dinner" value="1">Dinner<br>
							<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
						</div>
						</form>
					</div>
					<footer class="container" style="background-color:#0099cc; color:#fff">
						<p style="padding-left:30px;">Students should submit their choice before 10am otherwise your entry will not be considered!!</p>
					</footer>
				</div>
			</div>
		<! LAUNDRY >
		<div id="laundry" class="modal" style="padding-top: 20px">
				<div class="modal-content">
					<header class="container" style="background-color:#0099cc"> 
						<span onclick="document.getElementById('laundry').style.display='none'" 
						class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
						<h2 style="padding-left:30px; color: #fff">Laundry</h2>
					</header>
					<div class="container"style="padding-left:30px; margin-right:30px">
					<form method="post" action="/Hostel/Student/laundry.php">
					<div class="form-inline form-group" >
					<input type="checkbox" name="type[]" class="form-control" value="1" style="height:20px;">Tops:
					Quantity:
					<input type = "number" class="form-control" name="q[]" min="1" max="5" style="width:100px;">
					</div>
					<div class="form-inline form-group">
					<input type="checkbox" name="type[]" class="form-control" value="2" style="height:20px">Jeans:
					Quantity:
					<input type = "number" class="form-control" name="q[]" min="1" max="5" style="width:100px;"> 
					</div> 
					<div class="form-inline form-group">
					<input type="checkbox" name="type[]" class="form-control" value="3" style="height:20px">Formals:
					Quantity:.
					<input type = "number" class="form-control" name="q[]" min="1" max="5" style="width:100px;">
					</div>
					<div class="form-inline form-group">
					<input type="checkbox" name="type[]" class="form-control" value="4" style="height:20px">Bedsheets:	
					Quantity:
					<input type = "number" class="form-control" name="q[]" min="1" max="5" style="width:100px;">
					</div>
					<div class="form-inline form-group">
					<input type="checkbox" name="type[]" class="form-control" value="5" style="height:20px">Ethnic:			
					Quantity:
					<input type = "number" class="form-control" name="q[]" min="1" max="5" style="width:100px;">
					</div>
					<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 210px">SUBMIT</button>
					<br>
					<br>
					</form>
					</div>
					<footer class="container" style="background-color:#0099cc; color:#fff">
						<p style="padding-left:30px;">The laundry will be back according to your Floor Day.</p>
					</footer>
				</div>
			</div>
		<! CLEANING >
		<div id="cleaning" class="modal" style="padding-top: 50px">
				<div class="modal-content">
					<header class="container" style="background-color:#0099cc"> 
						<span onclick="document.getElementById('cleaning').style.display='none'" 
						class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
						<h2 style="padding-left:30px; color: #fff">Cleaning</h2>
					</header>
					<div class="container"style="padding-left:30px; margin-right:30px">
						<form method="post" action="/Hostel/Student/cleaning.php">
							<div class="form-group" >
								Date:
								<input type ="date" class="form-control" name="date" required>
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
							<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 210px">SUBMIT</button>
						</form>
					</div>
					<footer class="container" style="background-color:#0099cc; color:#fff">
						<p style="padding-left:30px;">Students are requested to be present during the cleaning of their rooms</p>
					</footer>
				</div>
			</div>

			<! BILL >
			<div id="bill" class="modal" style="padding-top:160px; padding-left:300px">
			<div class="modal-content" style="padding-bottom:10px">
				<header class="container" style="background-color:#0099cc"> 
					<span onclick="document.getElementById('bill').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
					<h2 style="padding-left:30px; color: #fff">Bills</h2>
				</header>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
						<form method="post" action="/Hostel/Student/bill.php">
							<div class="form-group">
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
							<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
						</form>
				</div>
			</div>
	</div>
	<! TRANSPORTATION >
	<div id="transport" class="modal" >
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('transport').style.display='none'" 
				class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">BOOK YOUR RIDE!!</h2>
			</header>
			<div class="container"> 
				<form style="padding-left:20px;" action="/Hostel/Student/transport.php" method="post">
				Date:<br>
				<input type="date" name="dat">
				<br><br>
				<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">BOOK</button>
				</form>
			</div>
			<footer class="container" style="background-color:#0099cc; color:#fff">
				<p style="padding-left:30px;">Students can book a vehicle for the selected date.The vehicle will be alloted according to the availability!!</p>
			</footer>
		</div>
	</div>
	<! ESSENTIALS >
	<div id="essentials" class="modal" style="padding-top: 50px">
				<div class="modal-content" style="width:950px;">
					<header class="container" style="background-color:#0099cc"> 
						<span onclick="document.getElementById('essentials').style.display='none'" 
						class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
						<h2 style="padding-left:30px; color: #fff">Essentials</h2>
					</header>
					<div class="container"style="padding-left:30px; margin-right:30px">
					<form method="post" action="/Hostel/Student/essentials_modal.php">
					<div class="form-inline form-group" >
					Item 1:
					<?php
						echo '<select name="cat1" class="form-control">';
						$cat = 'SELECT * FROM `Category_Items`';
						$res = $connect->query($cat);
						while($c = $res->fetch_assoc())
							echo '<option value='.$c['Sr_No'].'>'.$c['Category'].'</option>';
						echo '</select>';
					?>
					Description:
					<input type ="text" class="form-control" name="i1" required>
					Quantity:
					<input type = "number" class="form-control" name="q1" required min="1">
					Unit:
					<select class="form-control" name="u1">
					<option value="--">--</option>
					<option value="kg">kg</option>
					<option value="l">l</option>
					</select>
					</div>
					<div class="form-inline form-group">
					Item 2:
					<?php
						echo '<select name="cat2" class="form-control">';
						$cat = 'SELECT * FROM `Category_Items`';
						$res = $connect->query($cat);
						while($c = $res->fetch_assoc())
							echo '<option value='.$c['Sr_No'].'>'.$c['Category'].'</option>';
						echo '</select>';
					?>
					Description:
					<input type ="text" class="form-control" name="i2">
					Quantity:
					<input type = "number" class="form-control" name="q2" min="1">
					Unit:
					<select class="form-control" name="u2">
					<option value="--">--</option>
					<option value="kg">kg</option>
					<option value="l">l</option>
					</select>
					</div> 
					<div class="form-inline form-group">
					Item 3:
					<?php
						echo '<select name="cat3" class="form-control">';
						$cat = 'SELECT * FROM `Category_Items`';
						$res = $connect->query($cat);
						while($c = $res->fetch_assoc())
							echo '<option value='.$c['Sr_No'].'>'.$c['Category'].'</option>';
						echo '</select>';
					?>
					Description:
					<input type ="text" class="form-control" name="i3">
					Quantity
					<input type = "number" class="form-control" name="q3" min="1">
					Unit:
					<select class="form-control" name="u3">
					<option value="--">--</option>
					<option value="kg">kg</option>
					<option value="l">l</option>
					</select>
					</div>
					<div class="form-inline form-group">
					Item 4:
					<?php
						echo '<select name="cat4" class="form-control">';
						$cat = 'SELECT * FROM `Category_Items`';
						$res = $connect->query($cat);
						while($c = $res->fetch_assoc())
							echo '<option value='.$c['Sr_No'].'>'.$c['Category'].'</option>';
						echo '</select>';
					?>
					Description:
					<input type ="text" class="form-control" name="i4">
					Quantity:
					<input type = "number" class="form-control" name="q4" min="1">
					Unit:
					<select class="form-control" name="u4">
					<option value="--">--</option>
					<option value="kg">kg</option>
					<option value="l">l</option>
					</select>
					</div>
					<div class="form-inline form-group">
					Item 5:
					<?php
						echo '<select name="cat5" class="form-control">';
						$cat = 'SELECT * FROM `Category_Items`';
						$res = $connect->query($cat);
						while($c = $res->fetch_assoc())
							echo '<option value='.$c['Sr_No'].'>'.$c['Category'].'</option>';
						echo '</select>';
					?>
					Description:
					<input type ="text" class="form-control" name="i5">
					Quantity:
					<input type = "number" class="form-control" name="q5" min="1">
					Unit:
					<select class="form-control" name="u5">
					<option value="--">--</option>
					<option value="kg">kg</option>
					<option value="l">l</option>
					</select>
					</div>
					<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 350px">SUBMIT</button>
					</form>
					</div>
					<footer class="container" style="background-color:#0099cc; color:#fff">
						<p style="padding-left:30px;">Students can order any items they need. The number of item is restricted to 5</p>
					</footer>
				</div>
			</div>

			<! VISITOR >
			<div id="visitor" class="modal" style="padding-top: 00px">
				<div class="modal-content">
					<header class="container" style="background-color:#0099cc"> 
						<span onclick="document.getElementById('visitor').style.display='none'" 
						class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
						<h2 style="padding-left:30px; color: #fff">Visitor</h2>
					</header>
					<div class="container"style="padding-left:30px; margin-right:30px">
						<form method="post" action="/Hostel/Student/visitor.php">
								<div class="form-group">
						      <label for="nm">Name:</label>
						      <input type="text" class="form-control" id="nm" name="nm" required>
								</div>
								<div class="form-group">
								   <label for="rel">Relation:</label>
								   <input type="text" class="form-control" id="rel" name= "rel">
								</div>
								<div class="form-group">
								   <label for="dv">Date of Visit:</label>
								   <input type="date" name="dv" class="form-control">
								</div>
								<div class="form-group">
								   <label for="tc">Time of Checkin:</label>
								   <input type="time" name="tc" class="form-control">
								</div>
								<div class="form-group">
								   <label for="dd">Date of Departure:</label>
								   <input type="date" name="dd" class="form-control">
								</div>
								<div class="form-group">
						       <label>Contact details:</label>
						       <input type="tel" placeholder="Ten digit number"  name="con" maxlength="10" pattern="[789]{1}[0-9]{9}" class="form-control">
						    </div>
							<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
						</form>
				</div>
			</div>
		</div>
		<! GRIEVANCES >
		<div id="grievances" class="modal" style="padding-top: 50px">
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('grievances').style.display='none'" 
				class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">Grievances</h2>
			</header>
			<div class="container"style="padding-left:30px; margin-right:30px">
				<form method="post" action="/Hostel/Student/grievances.php">
					<div class="form-group">
						<select name="subject" class="form-control">
							<option value=1>Essentials</option>
							<option value=2>Food</option>
							<option value=3>Furniture</option>
							<option value=4>Hot water</option>
							<option value=5>In time</option>
							<option value=6>Laundry</option>
							<option value=7>Miscellaneous</option>
							<option value=8>Vehicles</option>
							<option value=9>Wifi</option>
						</select>
						Complaint:
						<input type ="text" class="form-control" name="msg">
					</div>
					<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 210px">SUBMIT</button>
				</form>
			</div>
			<footer class="container" style="background-color:#0099cc; color:#fff">
				<p style="padding-left:30px;">We will try to solve the issue at the earliest.</p>
			</footer>
		</div>
	</div>	
	<div id="price" class="modal" style="padding-top: 50px">
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('price').style.display='none'" 
				class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">Price List</h2>
			</header>
			<div class="container"style="padding-left:30px; margin-right:30px">
				<?php
					$price = 'SELECT * FROM `Laundry`;';
					$res_price = $connect->query($price);
					echo '<center>';
					echo '<table id="t01" style="margin-top: 70px; max-width: 500px;">';
						echo '<tr>';
							echo '<th>Sr. No.</th>';
							echo '<th>Name</th>';
							echo '<th>Price</th> ';
						echo '</tr>';
					while($fetch = $res_price->fetch_assoc())
					{
						echo '<tr>';
						echo '<td>'.$fetch['ID'].'</td>';
						echo '<td>'.$fetch['Name'].'</td>';
						echo '<td>'.$fetch['Price'].'</td>';
						echo '</tr>';
					}
					echo '</table>';
					echo '</center>';
				?>
			</div>
		</div>
	</div>
	<! NIGHT OUT>
	<div id="night" class="modal" style="padding-top: 50px">
		<div class="modal-content" style="width:700px;">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('night').style.display='none'" 
				class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">NIGHT OUT</h2>
			</header>
			<div class="container"> 
				<form style="padding-left:20px;" action="/Hostel/Student/night_out.php" method="post">
				Date:<br> 
				<div class="form-inline form-group">
					Leaving:<input  class="form-control" type="date" name="start">
					Coming back:<input  class="form-control" type="date" name="end"> 
				</div>
				<div class="form-group">
					Gaurdian Name:
					<input class="form-control" type="text" name="name">
				</div>
				<div class="form-group">
					Relation:
					<input class="form-control" type="text" name="rel">
				</div>
				<div class="form-group">
					Contact:
					<input class="form-control" type="text" name="con" pattern="[789]{1}[0-9]{9}">
				</div>
				<div class="form-group">
					Reason:
					<input class="form-control" type="textbox" name="reason">
				</div>
				<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 250px">SUBMIT</button>
				</form>
			</div>
			<footer class="container" style="background-color:#0099cc; color:#fff">
				<p style="padding-left:30px;">Students must adhere to the dates they have specified.</p>
			</footer>
		</div>
	</div>		
</body>
</html>
