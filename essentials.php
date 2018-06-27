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
		<li style="float:right"><a href="/Hostel/essentials_first.php">HOME</a></li>
	</ul>
	<div class="sidebar bar-block" style="background-color:#031836;width:15%; height: 120px; position:fixed">
	<center>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Essentials/list.php\' class="bar-item button" style="width: 180px; background-color:#333;">TODAY\'S LIST</button>';
	?>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Essentials/student.php\' class="bar-item button" style="width: 180px; background-color:#333;">STUDENT WISE LIST</button><br><br>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'bill\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">GENERATE BILL</button><br><br>';
	?>
	</center>
	</div>
<div id="bill" class="modal">
	<div class="modal-content" style="padding-bottom:30px;">
		<header class="container" style="background-color:#0099cc"> 
			<span onclick="document.getElementById('bill').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
			<h2 style="padding-left:30px; color: #fff">Bill</h2>
		</header>
		<?php
			$date = Date("Y-m-d");
			$display = 'SELECT `Hostelite_ID` FROM `Essentials` WHERE `date`=\''.$date.'\';';
			$res = $connect->query($display);
			$num = $res->num_rows;
			if($num)
			{
		?>
		<div class="container"style="padding-left:30px; margin-right: 30px;">
				<form name= "dis" method="post" action="/Hostel/Essentials/bill.php">
					<?php
						echo '<div class="form-inline form-group">';
						echo '<select name="id" class = "form-control">';
						while($dis = $res->fetch_assoc())
							echo '<option value='.$dis["Hostelite_ID"].'>'.$dis["Hostelite_ID"].'</option>';
						echo '</select>';
					?>
					<div class="form-inline form-group">
						Delivered:
						<input type="checkbox" name = "del" class="form-control" required>
						<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>
					</div>
				</form>
		</div>
		<?php
			}
			else
			{
		?>
				<div class="container"style="padding-left:30px; margin-right: 30px;">
					<p> No orders for today! </p>
				</div>
		<?php
			}
		?>
	</div>
</div>
