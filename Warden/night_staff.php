<!DOCTYPE html>
<?php
	require_once('../connect.php');
	require_once('../warden.php');
	$date=Date("Y-m-d");
	$sql='SELECT * FROM `Night_Out` WHERE `Date_start` = \''.$date.'\' ;';
	$result=$connect->query($sql);
	$resultCheck=$result->num_rows;
?>
<html>
<body>
  <h2><center>List Of Night-Out Students :</center></h2>
		<?php	echo '<center>';
			echo '<table id="t01" style="margin-top: 50px; max-width: 800px; margin-left:10px;">';
				echo '<tr>';
					echo '<th>Sr No.</th>';
					echo '<th>Hostelite ID</th>';
					echo '<th>Date Start</th>';
					echo '<th>Date End</th>';
					echo '<th>Reason</th>';
					echo '<th>Guardian-Name</th>';
					echo '<th>Relationship</th>';
					echo '<th>Guardian Contact</th>';
				echo '</tr>';
		  $i = 1;
		?>
		<script>
			window.alert( "<?php echo $resultCheck.' row(s) fetched' ?>");
		</script>
		<?php
      while($row =  $result->fetch_assoc()) 
			{		   
				echo "<tr>";
					echo "<td>".$i."</td>";
	        echo "<td>".$row["Hostelite_ID"]."</td>";
					echo "<td>".$row["Date_start"]."</td>";
					echo "<td>".$row["Date_end"]."</td>";
					echo "<td>".$row["Reason"]."</td>";
					echo "<td>".$row["Gaurdian_Name"]."</td>";
					echo "<td>".$row["G_Relation"]."</td>";
					echo "<td>".$row["G_Contact"]."</td>";
				echo "</tr>";
				$i = $i + 1;
			}		
			echo '</table>';
			echo '</center>';				
			?>
</body>
</html>
