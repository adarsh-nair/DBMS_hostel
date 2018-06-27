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
		$date = test_input($_POST["date"]);
		$select='SELECT * FROM `Transportation` as t, `Hostelite` as h,`Vehicle` as v WHERE  h.Hostelite_ID=t.Hostelite_ID and `T_date`=\''.$date.'\' and v.number_plate=t.number_plate;';
		$result=$connect->query($select);
		$resultCheck=$result->num_rows;
		echo '<button onclick="document.getElementById(\'details\').style.display=\'block\'" class="bar-item button" style="width: 180px; background-color:#333; margin-left:900px;margin-top:50px;">VEHICLE DETAILS</button>';
			echo '<center>';
			echo '<table id="t01" style="margin-top: 50px; max-width: 700px; margin-left:10px;">';			
				echo '<tr>';
					echo '<th>Checkbox</th>';
					echo '<th>Sr No.</th>';
					echo '<th>Hostelite ID</th>';
					echo '<th>Student Name</th>';
					echo '<th>Number-Plate</th>';
					echo '<th>Issue-date</th>';
					echo '<th>Kilometers</th>';
				echo '</tr>';
        $i = 1;
			echo '<script>window.alert("'.$resultCheck.' row(s) fetched");</script>';
			echo '<form style="padding-left:20px;" method="post" action="up_transport.php">';
	             while($row =  $result->fetch_assoc()) 
			{
			   
				echo "<tr>";
					echo '<td><input type="checkbox" name="id[]" value="'.$row["Trans_id"].'"/></td>';
					echo "<td>",$i,"</td>";
	        echo "<td>",$row["Hostelite_ID"],"</td>";
					echo "<td>",$row["Name"],"</td>";
					echo "<td>",$row["number_plate"],"</td>";
					echo "<td>",$row["T_date"],"</td>";
					if($row["kilometer"] > 0 )
						echo "<td>",$row["kilometer"],"</td>";
				  else
						echo '<td><input type="number" name="kilometer[]" min="5"></td>';         
				 echo "</tr>";
				$i = $i + 1;
			}
		echo '</table>';
		echo '<br>';
		echo '<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px">SUBMIT</button>';
			echo '</form>'; 
		echo '</center>';
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
			$vehicle = 'SELECT * FROM `Vehicle`;';
			$out = $connect->query($vehicle);
			echo '<table id="t01" style=" margin-left: 30px; max-width: 500px;">';
					echo '<tr>';
						echo '<th style="width:10px">Sr No.</th>';
						echo '<th style="width:70px">Number Plate</th>';
						echo '<th style="width:40px">Model</th>';
					echo '</tr>';
					$i = 1;
					while($row_v = $out->fetch_assoc()) 
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$row_v["number_plate"]."</td>";
							echo "<td>".$row_v["model"]."</td>";
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
