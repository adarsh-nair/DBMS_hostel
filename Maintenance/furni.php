<?php
	session_start();
	require_once('../connect.php');
	require_once('../maintenance.php');
//	$date = Date("Y-m-d");
	$date = '2017-09-03';
	$furni = 'SELECT `Date_def`,`Hostelite_ID`, h.`Name`, h.`Room_No`,`Contact`, `Win_doors`, `Bed`, `Furniture` FROM `Hostelite` as h, `Room` as r WHERE r.`Room_No` = h.`Room_No` AND `Date_def` = \''.$date.'\' AND (`Win_doors` = \'Y\' OR `Bed` = \'Y\' OR `Furniture` = \'Y\');';
	$res = $connect->query($furni);
	if($res->num_rows)
	{
		echo '<table id="t01" style="margin-left: 320px; margin-top: 50px; max-width: 830px;">';
			echo '<tr>';
				echo '<th>Sr No.</th>';
				echo '<th>Hostelite_ID</th>';
				echo '<th>Name</th>';
				echo '<th>Room No</th> ';
				echo '<th>Contact</th>';
				echo '<th>Windows and Door</th>';
				echo '<th>Bed</th>';
				echo '<th>Furniture</th>';
				echo '<th>Date</th>';
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
			echo '<td>'.$out["Win_doors"].'</td>';
			echo '<td>'.$out["Bed"].'</td>';
			echo '<td>'.$out["Furniture"].'</td>';
			echo '<td>'.$out["Date_def"]."</td>";
			echo '</tr>';
			$i = $i + 1;
		}
	}
	else
	{
		echo '<script>window.alert(\'No entries to display\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/maintenance_first.php\'</script>';
	}	
?>
