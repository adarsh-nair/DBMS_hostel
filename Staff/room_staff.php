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
	$choice = $_POST['choice'];
	$defect = $_POST['defects'];
	if($choice == 'All')
	{
		if($defect == 'All')
			$select = 'SELECT * FROM `Room`';
		elseif($defect == 'Carpenter')
			$select = 'SELECT * FROM `Room` WHERE `Win_doors` = \'Y\' OR `Furniture` = \'Y\' OR `Bed`=\'Y\'';
		elseif($defect == 'Plumber')
			$select = 'SELECT * FROM `Room` WHERE `Water` = \'Y\'';
		else
			$select = 'SELECT * FROM `Room` WHERE `Electricity` = \'Y\'';
	}
	else if($choice == 'Occupied')
	{		
		if($defect == 'All')
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'Y\'';
		elseif($defect == 'Carpenter')
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'Y\' AND (`Win_doors` = \'Y\' OR `Furniture` = \'Y\' OR `Bed`=\'Y\')';
		elseif($defect == 'Plumber')
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'Y\' AND `Water` = \'Y\'';
		else
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'Y\' AND `Electricity` = \'Y\'';
	}
	else
	{
		if($defect == 'All')
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'N\'';
		elseif($defect == 'Carpenter')
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'N\' AND (`Win_doors` = \'Y\' OR `Furniture` = \'Y\' OR `Bed`=\'Y\')';
		elseif($defect == 'Plumber')
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'N\' AND `Water` = \'Y\'';
		else
			$select = 'SELECT * FROM `Room` WHERE `Occupied` = \'N\' AND `Electricity` = \'Y\'';
	}
	$output = $connect->query($select);
	echo '<button onclick="document.getElementById(\'check\').style.display=\'block\'" class="bar-item button" style="margin-left:1000px; width: 180px; background-color:#333;">ROOM OCCUPANCY</button><br><br>';
		if($output->num_rows)
		{
			echo '<table id="t01" style="margin-top: 10px; margin-left:280px;max-width: 850px;">';
				echo '<tr>';
					echo '<th>Sr No.</th>';
					echo '<th>Room No.</th>';
					echo '<th>Windows and Doors</th>';
					echo '<th>Water</th> ';
					echo '<th>Electricity</th> ';
					echo '<th>Furniture</th> ';
					echo '<th>Bed</th> ';
					echo '<th>Occupied</th> ';
					echo '<th>Date of Complaint</th>';
				echo '</tr>';
				$i = 1;
			while($row=$output->fetch_assoc())
			{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$row["Room_No"]."</td>";
							echo "<td>".$row["Win_doors"]."</td>";
							echo "<td>".$row["Water"]."</td>";				
							echo "<td>".$row["Electricity"]."</td>";
							echo "<td>".$row["Furniture"]."</td>";
							echo "<td>".$row["Bed"]."</td>";
							echo "<td>".$row["Occupied"]."</td>";
							echo "<td>".$row["Date_def"]."</td>";
						echo "</tr>";
						$i = $i +1;
			}
			echo '</table>';
	}
	else
		echo '<h2><center>No rooms in this category</center</h2>';
}
?>
	<div id="check" class="modal" style="padding-top: 50px">
		<div class="modal-content">
		<header class="container" style="background-color:#0099cc"> 
			<span onclick="document.getElementById('check').style.display='none'" 
			class="button btn-submit display-topright">&times;</span>
			<h2 style="color:#fff; margin-left: 10px">Rooms</h2>
		</header>
		<div class="container" style="margin-left: 10px; margin-right: 10px; color:black;">
		<?php
			$i = 1;
			$length = array(0,0,0,0,0,0,0);
			while($i<8)
			{
				$bar = 'SELECT count(`Room_No`) FROM `Room` WHERE `Room_No` LIKE \''.$i.'%\' AND `Occupied` = \'Y\'';
				$output = $connect->query($bar);
				$len = $output->fetch_assoc();
				$length[$i-1] = round($len["count(`Room_No`)"]/12*100);
				$i = $i +1;
			}
			echo '<p>First Floor: <div style="color:#000!important;background-color:#d1d1d1!important">
<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length[0].'%">'.$length[0].'%</div>
</div></p>
			<p>Second Floor: <div style="color:#000!important;background-color:#d1d1d1!important">
<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length[1].'%">'.$length[1].'%</div>
</div></p>
			<p>Third Floor: <div style="color:#000!important;background-color:#d1d1d1!important">
<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length[2].'%">'.$length[2].'%</div>
</div></p>
			<p>Fourth Floor: <div style="color:#000!important;background-color:#d1d1d1!important">
<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length[3].'%">'.$length[3].'%</div>
</div></p>
			<p>Fifth Floor:<div style="color:#000!important;background-color:#d1d1d1!important">
<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length[4].'%">'.$length[4].'%</div>
</div></p>
			<p>Sixth Floor:<div style="color:#000!important;background-color:#d1d1d1!important">
<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length[5].'%">'.$length[5].'%</div>
</div></p>
			<p>Seventh Floor: <div style="color:#000!important;background-color:#d1d1d1!important">
<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length[6].'%">'.$length[6].'%</div>
</div><br></p>';
		?>
		</div>
		</div>
	</div>
</BODY>
</HTML>
