<?php
	session_start();
	require_once('../connect.php');
	require_once('../warden.php');
	$date = Date('Y-m-d');
	$select = 'SELECT * FROM `Visitor` WHERE `Date_of_Departure` >= \''.$date.'\' AND Time_OUT=\'00:00:00\'';
	$res = $connect->query($select);
	echo '<center>';			
		echo '<table id="t01" style="margin-top: 50px; max-width: 900px; margin-left:100px;">';					
			echo '<tr>';							
				echo '<th>Sr No.</th>';
				echo '<th>Hostelite ID</th>';
				echo '<th>Room No</th>';
				echo '<th>Name</th>';
				echo '<th>Relation</th>';
				echo '<th>Date of Visit</th>';
				echo '<th>Date of Departure</th>';
				echo '<th>Check out time</th>';
			echo '</tr>';
      $i = 1;
			echo '<form style="padding-left:20px" method="post" action="up_visitor.php">';
			while($row = $res->fetch_assoc())
			{
				echo '<tr>';
				echo '<td><input type="hidden" name="id[]" value="'.$row["ID"].'">'.$i.'</td>';
				echo '<td>'.$row["Hostelite_ID"].'</td>';
				echo '<td><input type="hidden" name="room[]" value="'.$row["Room_No"].'">'.$row["Room_No"].'</td>';
				echo '<td>'.$row["Name"].'</td>';
				echo '<td>'.$row["Relation"].'</td>';
				echo '<td>'.$row["Date_of_Visit"].'</td>';
				echo '<td>'.$row["Date_of_Departure"].'</td>';
				echo '<td><input type="time" name="time[]" class="form-control" value="00:00"></td>';
				echo '</tr>';
				$i = $i + 1;
			}
			echo '</table>';
			echo '<br>';
			echo '<center><button type="submit" name="SAVE">SAVE</button></center>';
		echo '</form>'; 
	echo '</center>';
?>

