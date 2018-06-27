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
		<li><a href="/Hostel/housekeeping.php">HOME AWAY FORM HOME</a></li>  
		<li style="float:right"><a href="/Hostel/logout.php">LOGOUT</a></li>
		<li style="float:right"><a href="#contact">CONTACT</a></li>
		<li style="float:right"><a href="/Hostel/auto.php">HOME</a></li>
	</ul>
	<div class="sidebar bar-block" style="background-color:#031836;width:15%; height: 120px; position:fixed">
	<center>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Housekeeping/schedule.php\' class="bar-item button" style="width: 180px; background-color:#333;">TODAY\'S SCHEDULE</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Housekeeping/staff.php\' class="bar-item button" style="width: 180px; background-color:#333;">STAFF</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'expense\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">EXPENSES</button>';
	?>
	</div>

	<div id="expense" class="modal" style="padding-top:150px">
		<div class="modal-content" style="width:800px">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('expense').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
				<h2 style="padding-left:30px; color: #fff">Expenses</h2>
			</header>
			<div class="container"style="padding-left:30px; margin-right: 30px; margin-bottom:10px;">
				<form method="post" action="/Hostel/Housekeeping/expenses.php">
					<div class="form-inline form-group">
						<?php
						$select = 'SELECT * FROM `Category_House`';
						$res = $connect->query($select);
						echo 'Item Name: ';
						echo '<select name="item[]" class="form-inline form-control">';
							while($fetch_sec = $res->fetch_assoc())
								echo '<option value='.$fetch_sec["Sr_No"].'>'.$fetch_sec["Item_name"].'</option>';
						echo '</select>'
						?>
						Quantity:
						<input type="number" min = 1 value="quant[]" class="form-inline form-control" required>
						Price:
						<input type="number" min = 20 value="price[]" class="form-inline form-control" required>
					</div>
					<div class="form-inline form-group">
						<?php
						$select = 'SELECT * FROM `Category_House`';
						$res = $connect->query($select);
						echo 'Item Name: ';
						echo '<select name="item[]" class="form-inline form-control">';
							while($fetch_sec = $res->fetch_assoc())
								echo '<option value='.$fetch_sec["Sr_No"].'>'.$fetch_sec["Item_name"].'</option>';
						echo '</select>'
						?>
						Quantity:
						<input type="number" min = 1 value="quant[]" class="form-inline form-control" >
						Price:
						<input type="number" min = 20 value="price[]" class="form-inline form-control">
					</div>
					<div class="form-inline form-group">
						<?php
						$select = 'SELECT * FROM `Category_House`';
						$res = $connect->query($select);
						echo 'Item Name: ';
						echo '<select name="item[]" class="form-inline form-control">';
							while($fetch_sec = $res->fetch_assoc())
								echo '<option value='.$fetch_sec["Sr_No"].'>'.$fetch_sec["Item_name"].'</option>';
						echo '</select>'
						?>
						Quantity:
						<input type="number" min = 1 value="quant[]" class="form-inline form-control">
						Price:
						<input type="number" min = 20 value="price[]" class="form-inline form-control">
					</div>
						<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 300px">SUBMIT</button>
				</form>
					<br>
			</div>
		</div>
	</div>
