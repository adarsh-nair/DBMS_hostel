<!DOCTYPE html>
<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../staff.php');
	echo '</div></div>';
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$s_date = test_input($_POST["s_date"]);
			$e_date = test_input($_POST["e_date"]);
			$select = 'SELECT `Room_No`, `Housekeeping`.`Name` , `Date` , `Time` FROM `Housekeeping`, `Cleaning`, `Hostelite` WHERE `Housekeeping`.`Employee_ID`	= `Cleaning`.`Employee_ID` AND `date` >= \''.$s_date.'\' AND `date` <= \''.$e_date.'\' AND `Hostelite`.`Hostelite_ID` = `Cleaning`.`Hostelite_ID` ORDER BY `Housekeeping`.`Name`';
			$out_s = $connect->query($select);
						echo '<button onclick="document.getElementById(\'details\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333; margin-left:900px;margin-top:50px;">EMPLOYEE DETAILS</button>';
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
?>
<div id="details" class="modal">
	<div class="modal-content" style="padding-bottom:30px;">
		<header class="container" style="background-color:#0099cc"> 
			<span onclick="document.getElementById('details').style.display='none'" class="button btn-submit display-topright" style="cursor:pointer">&times;</span>
			<h2 style="padding-left:30px; color: #fff">Details</h2>
		</header>
		<div class="container"style="padding-left:30px; margin-right: 30px;">
		<?php
			$emp = 'SELECT*FROM `Housekeeping`;';
			$out = $connect->query($emp);
			echo '<table id="t01" style=" margin-left: 30px; max-width: 500px;">';
					echo '<tr>';
						echo '<th style="width:10px">Sr No.</th>';
						echo '<th style="width:50px">Employee ID</th>';
						echo '<th style="width:40px">Name</th>';
						echo '<th style="width:70px">Contact</th> ';
						echo '<th style="width:70px">Time</th> ';
					echo '</tr>';
					$i = 1;
					while($row_e = $out->fetch_assoc()) 
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$row_e["Employee_ID"]."</td>";
							echo "<td>".$row_e["Name"]."</td>";
							echo "<td>".$row_e["Contact"]."</td>";
							echo "<td>".$row_e["Time_slot"]."</td>";
						echo "</tr>";
						$i = $i + 1;
					}
					echo '</table>';
		?>
		</div>
	</div>
</div>
</BODY>
</HTML>

