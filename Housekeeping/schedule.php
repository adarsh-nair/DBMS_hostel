<?php
	require_once('../connect.php');
	require_once('../housekeeping.php');
	$date = Date('Y-m-d');
	$select = 'SELECT `Room_No`, `Housekeeping`.`Name` , `Date` , `Time` FROM `Housekeeping`, `Cleaning`, `Hostelite` WHERE `Housekeeping`.`Employee_ID`	= `Cleaning`.`Employee_ID` AND `date` = \''.$date.'\' AND `Hostelite`.`Hostelite_ID` = `Cleaning`.`Hostelite_ID` ORDER BY `Housekeeping`.`Name`';
			$out_s = $connect->query($select);
	echo '</div></div>';
	if($out_s->num_rows)
	{
		echo '<table id="t01" style="margin-top: 50px; max-width: 750px;margin-left:320px;">';
			echo '<tr>';
				echo '<th style="width:10px">Sr No.</th>';
				echo '<th style="width:50px">Room Number</th>';
				echo '<th style="width:40px">Name</th>';
				echo '<th style="width:70px">Date</th> ';
				echo '<th style="width:70px">Time</th> ';
			echo '</tr>';
		$i = 1;
		$n_row = $out_s->num_rows;
	?>
	<script>
	window.alert( "<?php echo $n_row.' row(s) fetched' ?>");
	</script>
	<?php
		while($row = $out_s->fetch_assoc()) 
		{
			echo "<tr>";
				echo "<td>".$i."</td>";
				echo "<td>".$row["Room_No"]."</td>";
				echo "<td>".$row["Name"]."</td>";
				echo "<td>".$row["Date"]."</td>";
				echo "<td>".$row["Time"]."</td>";
			echo "</tr>";
			$i = $i + 1;
		}
		echo '</table>';
	}
	else
	{
		echo '<script>window.alert(\'No entries to display\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/housekeeping_first.php\'</script>';
	}
?>
