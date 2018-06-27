<?php
	require_once('../connect.php');
	require_once('../housekeeping.php');
	$emp = 'SELECT*FROM `Housekeeping`;';
	$out = $connect->query($emp);
	echo '</div></div>';
	echo '<h3><center>Employee Details</center></h3>';
	echo '<table id="t01" style="margin-top:30px; margin-left: 320px; max-width: 700px;">';
			echo '<tr>';
				echo '<th style="width:50px">Sr No.</th>';
				echo '<th style="width:90px">Employee ID</th>';
				echo '<th style="width:40px">Name</th>';
				echo '<th style="width:70px">Contact</th> ';
				echo '<th style="width:70px">Time</th> ';
			echo '</tr>';
			$i = 1;
			while($row_e = $out->fetch_assoc()) 
			{
				echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>EMP0".$row_e["Employee_ID"]."</td>";
					echo "<td>".$row_e["Name"]."</td>";
					echo "<td>".$row_e["Contact"]."</td>";
					echo "<td>".$row_e["Time_slot"]."</td>";
				echo "</tr>";
				$i = $i + 1;
			}
			echo '</table>';
?>
