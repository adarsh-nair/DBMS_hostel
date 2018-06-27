<!DOCTYPE html>
<?php
	require_once('../connect.php');
	require_once('../warden.php');
	$date=Date("Y-m-d");
	$sql='SELECT i.Hostelite_ID,h.Name,h.Room_No FROM Hostelite as h, In_Out as i WHERE `date`= \''.$date.'\'  and h.Hostelite_ID=i.Hostelite_ID ;';
	$result=$connect->query($sql);
	$resultCheck=$result->num_rows;
?>
<html>
<body>
  <h2><center>List Of Students Present in Hostel Today:</center></h2>
		<?php	
			echo '<center>';
			echo '<table id="t01" style="margin-top: 50px; max-width: 500px; margin-left:10px;">';		
				echo '<tr>';
					echo '<th>Sr No.</th>';
					echo '<th>Hostelite ID</th>';
					echo '<th>Student Name</th>';
					echo '<th>Room No.</th>';
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
					echo "<td>".$row["Name"]."</td>";
					echo "<td>".$row["Room_No"]."</td>";
				echo "</tr>";
				$i = $i + 1;
			}					
			echo '</table>';		
			echo '</center>';
				
			?>
</body>
</html>
