<?php
	session_start();
	require_once('../connect.php');
	require_once('../essentials.php');
	$date = Date("Y-m-d");
	$student = 'SELECT h.`Hostelite_ID`, `Name`, `Room_No`, `Contact`, c.Category, `Item_name`, Quantity FROM `Category_Items` as c, `Items` as i, `Essentials` as e, `Hostelite` as h WHERE e.Hostelite_ID = h.Hostelite_ID AND c.`Sr_No` = i.`Category` AND e.`Date` = \''.$date.'\' AND e.`Sr_No` = i.`Sr_No`;';
	$res = $connect->query($student);
	echo '</div></div>';
	if($res->num_rows)
	{
		echo '<table id="t01" style="margin-left: 300px; margin-top: 70px; max-width: 900px;">';
			echo '<tr>';
				echo '<th>Sr No.</th>';
				echo '<th>Hostelite ID</th>';
				echo '<th>Name</th>';
				echo '<th>Room No.</th>';
				echo '<th>Contact</th>';
				echo '<th>Category</th>';
				echo '<th>Item name</th>';
				echo '<th>Quantity</th> ';
			echo '</tr>';
		$i = 1;
		while($out = $res->fetch_assoc())
		{
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$out["Hostelite_ID"].'</td>';		
			echo '<td>'.$out["Name"].'</td>';
			echo '<td>'.$out["Room_No"].'</td>';
			echo '<td>'.$out["Contact"].'</td>';
			echo '<td>'.$out["Category"].'</td>';
			echo '<td>'.$out["Item_name"].'</td>';
			echo '<td>'.$out["Quantity"].'</td>';
			echo '</tr>';
			$i = $i + 1;
		}
	}
	else
	{
		echo '<script>window.alert(\'No entries to display\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/essentials_first.php\'</script>';
	}
?>

