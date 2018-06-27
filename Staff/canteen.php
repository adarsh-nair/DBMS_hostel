<!DOCTYPE html>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../staff.php');
	$date=Date("Y-m-d");
	$select_1='SELECT f.Hostelite_ID, h.Name FROM `Food` as f, `Hostelite` as h WHERE `date`= \''.$date.'\' and food_type=1 and h.Hostelite_ID=f.Hostelite_ID ;';
	$select_2='SELECT f.Hostelite_ID, h.Name FROM `Food` as f, `Hostelite` as h WHERE `date`= \''.$date.'\' and food_type=2 and h.Hostelite_ID=f.Hostelite_ID ;';
	$result_1=$connect->query($select_1);
	$resultCheck_1=$result_1->num_rows;
	$result_2=$connect->query($select_2);
	$resultCheck_2=$result_2->num_rows;
	echo '<h2><center>Students interested in today\'s Lunch:</center></h2></center>';
	echo '<center>';
	echo '<table id="t01" style="margin-top: 50px; max-width: 500px; margin-left:10px;">';		
		echo '<tr>';
			echo '<th>Sr No.</th>';
			echo '<th>Hostelite ID</th>';
			echo '<th>Student Name</th>';
		echo '</tr>';
            $i = 1;
		echo '<script>window.alert("'.$resultCheck_1.' row(s) fetched"); </script>';
	  while($row =  $result_1->fetch_assoc()) 
		{	   
			echo "<tr>";
				echo "<td>",$i,"</td>";
			  echo "<td>",$row["Hostelite_ID"],"</td>";
				echo "<td>",$row["Name"],"</td>";		
			echo "</tr>";
			$i = $i + 1;
		}					
	echo '</table>';		
	echo '</center>';				
echo '<h2><center>Students interested in today\'s Dinner:</center></h2>';
echo '<center>';
echo '<table id="t01" style="margin-top: 50px; max-width: 500px; margin-left:10px;">';
	echo '<tr>';
		echo '<th>Sr No.</th>';
		echo '<th>Hostelite ID</th>';
		echo '<th>Student Name</th>';
		echo '</tr>';
	  $i = 1;
	echo '<script>window.alert("'.$resultCheck_2.' row(s) fetched");</script>';
  while($row1 =  $result_2->fetch_assoc()) 
	{				   
		echo "<tr>";
			echo "<td>",$i,"</td>";
			echo "<td>",$row1["Hostelite_ID"],"</td>";
			echo "<td>",$row1["Name"],"</td>";
		echo "</tr>";
		$i = $i + 1;
	}
echo '</table>';
echo '</center>';				
$connect->close();
?>
</BODY>
</HTML>

