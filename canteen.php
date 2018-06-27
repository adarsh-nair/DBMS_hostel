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
		<li style="float:right"><a href="/Hostel/canteen_first.php">HOME</a></li>
	</ul>
	<div class="sidebar bar-block" style="background-color:#031836;width:15%; height: 80px; position:fixed">
	<center>
	<?php
		echo '<button onclick=window.document.location.href=\'/Hostel/Canteen/list.php\' class="bar-item button" style="width: 180px; background-color:#333;">TODAY\'S LIST</button>';
	?>
	<?php
		echo '<button onclick="document.getElementById(\'menu\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333;">TOMORROW\'S MENU</button><br><br>';
	?>
	</center>
	</div>
<div id="menu" class="modal">
	<div class="modal-content" style="padding-bottom:30px; width:850px;">
		<header class="container" style="background-color:#0099cc"> 
			<span onclick="document.getElementById('menu').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
			<h2 style="padding-left:30px; color: #fff">Tomorrow's Menu</h2>
		</header>
		<div class="container"style="padding-left:30px; margin-right: 30px;">
				<form name= "dis" method="post" action="/Hostel/Canteen/menu.php">
					<div class="form-inline form-group">
					Lunch:
						<br>
						Item 1:
						<input class="form-control" type="text" name="l1" required>
						Item 2:
						<input class="form-control" type="text" name="l2" required>
						Item 3:
						<input class="form-control" type="text" name="l3" required>
					</div>
					<div class="form-inline form-group">
					Dinner:
						<br>
						Item 1:
						<input class="form-control" type="text" name="d1" required>
						Item 2:
						<input class="form-control" type="text" name="d2" required>
						Item 3:
						<input class="form-control" type="text" name="d3" >
					</div>
						<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 300px">SUBMIT</button>
					</div>
				</form>
		</div>
	</div>
</div>
