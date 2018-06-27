<!DOCTYPE html>
<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../staff.php');
	echo '</div></div>';
			$select = 'SELECT `Hostelite_ID`, `Room_No`, `Name`, `DOB`, `Contact`, `Fees`, `Address`, `Email_ID`, `Fname`, `Fcontact` FROM `Hostelite` WHERE 1;';
			$out_s = $connect->query($select);
		echo '<table id="t01" style="margin-top: 50px; max-width: 950px;margin-left:300px;">';
							echo '<tr>';
								echo '<th style="width:10px">Sr No.</th>';
								echo '<th style="width:30px">Hostelite ID</th>';
								echo '<th style="width:40px">Room No</th>';
								echo '<th style="width:70px">Name</th> ';
								echo '<th style="width:80px">Date of Birth</th> ';
								echo '<th style="width:80px">Contact</th> ';
								echo '<th style="width:20px">Fees</th> ';
								echo '<th style="width:70px">Address</th> ';
								echo '<th style="width:100px">Email ID</th> ';
								echo '<th style="width:70px">Father\'s Name</th> ';
								echo '<th style="width:80px">Father\'s Contact</th> ';
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
								echo "<td>".$row["DOB"]."</td>";
								echo "<td>".$row["Contact"]."</td>";
								echo "<td>".$row["Fees"]."</td>";
								echo "<td>".$row["Address"]."</td>";
								echo "<td>".$row["Email_ID"]."</td>";
								echo "<td>".$row["Fname"]."</td>";
								echo "<td>".$row["Fcontact"]."</td>";
							echo "</tr>";
							$i = $i + 1;
						}
						echo '</table>';
						$connect->close();
?>
</BODY>
</HTML>

