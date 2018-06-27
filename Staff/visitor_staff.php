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
			$select = 'SELECT `Hostelite_ID`, `Room_No`, `Name`, `Relation`, `Contact`, `Date_of_Visit`, `Time_IN`, `Date_of_Departure`  FROM `Visitor` WHERE `Date_of_Visit` >= \''.$s_date.'\' AND `Date_of_Visit` <= \''.$e_date.'\'';
			$out_s = $connect->query($select);
		echo '<table id="t01" style="margin-top: 50px; max-width: 750px;margin-left:320px;">';
							echo '<tr>';
								echo '<th style="width:10px">Sr No.</th>';
								echo '<th style="width:50px">Hostelite ID</th>';
								echo '<th style="width:40px">Room No</th>';
								echo '<th style="width:70px">Name</th> ';
								echo '<th style="width:70px">Relation</th> ';
								echo '<th style="width:80px">Contact</th> ';
								echo '<th style="width:120px">Date of Visit</th> ';
								echo '<th style="width:120px">Time of Checkin</th> ';
								echo '<th style="width:160px">Date of Departure</th> ';
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
								echo "<td>".$row["Hostelite_ID"]."</td>";
								echo "<td>".$row["Room_No"]."</td>";
								echo "<td>".$row["Name"]."</td>";
								echo "<td>".$row["Relation"]."</td>";
								echo "<td>".$row["Contact"]."</td>";
								echo "<td>".$row["Date_of_Visit"]."</td>";
								echo "<td>".$row["Time_IN"]."</td>";
								echo "<td>".$row["Date_of_Departure"]."</td>";
							echo "</tr>";
							$i = $i + 1;
						}
						echo '</table>';
						$connect->close();
			}
?>
</BODY>
</HTML>

