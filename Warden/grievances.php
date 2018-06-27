<!DOCTYPE html>
<?php
	require_once('../connect.php');
	require_once('../warden.php');
	$sql="SELECT complaint_no, Hostelite_ID,c.Subject_name, complaint, date , Addressed FROM `Grievances` as g, `Category_Gri` as c WHERE `Addressed`= 'N' and g.subject=c.ID ORDER BY c.Subject_name";
	$result=$connect->query($sql);
	$resultCheck=$result->num_rows;
	?>
<html>
<body>
  <h2><center>List Of Grievances:</center></h2>
		<?php	echo '<center>';			
			echo '<table id="t01" style="margin-top: 50px; max-width: 800px; margin-left:10px;">';					
				echo '<tr>';							
					echo '<th>Sr No.</th>';
					echo '<th>Complaint No</th>';
					echo '<th>Hostelite ID</th>';
					echo '<th>Category</th>';
					echo '<th>Complaint</th>';
					echo '<th>Date</th>';
					echo '<th>Checkbox</th>';
				echo '</tr>';
        $i = 1;
		?>
		<script>
			window.alert( "<?php echo $resultCheck.' row(s) fetched' ?>");
		</script>
		<?php
			echo '<form style="padding-left:20px;" method="post" action="up_griev.php">';
      while($row =  $result->fetch_assoc()) 
			{		   
				echo "<tr>";		
					echo "<td>".$i."</td>";
					echo "<td>".$row["complaint_no"]."</td>";
	        echo "<td>".$row["Hostelite_ID"]."</td>";
					echo "<td>".$row["Subject_name"]."</td>";
					echo "<td>".$row["complaint"]."</td>";
					echo "<td>".$row["date"]."</td>";
					echo '<td><input type="checkbox" name="id[]" value="'.$row["complaint_no"].'"/></td>';					
				echo "</tr>";
				$i = $i + 1;
			}					
			echo '</table>';
			echo '<br>';
			echo '<center><button type="submit" name="SAVE">SAVE</button></center>';
		echo '</form>'; 
		echo '</center>';
			?>
</body>
</html>
