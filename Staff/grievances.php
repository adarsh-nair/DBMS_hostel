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
			$select = 'SELECT `Hostelite_ID`,  `Subject_name`, `complaint`, `date` FROM `Grievances`, `Category_Gri` WHERE `date` >= \''.$s_date.'\' AND `date` <= \''.$e_date.'\' AND `subject` = `ID`';
			$out_s = $connect->query($select);
			echo '<button onclick="document.getElementById(\'graph\').style.display=\'block\'" class="bar-item button" style="margin-left:800px; margin-top:30px; width: 180px; background-color:#333;">Graph Representation</button><br><br>';					
			echo '<table id="t01" style="margin-top: 50px; max-width: 750px;margin-left:320px;">';
							echo '<tr>';
								echo '<th style="width:10px">Sr No.</th>';
								echo '<th style="width:50px">Hostelite ID</th>';
								echo '<th style="width:60px">Subject</th>';
								echo '<th style="width:120px">Complaint</th>';
								echo '<th style="width:70px">Date</th> ';
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
								echo "<td>".$row["Subject_name"]."</td>";
								echo "<td>".$row["complaint"]."</td>";
								echo "<td>".$row["date"]."</td>";
							echo "</tr>";
							$i = $i + 1;
						}
						echo '</table>';
			}
?>
	<div id="graph" class="modal" style="padding-top: 20px">
		<div class="modal-content">
			<header class="container" style="background-color:#0099cc"> 
				<span onclick="document.getElementById('graph').style.display='none'" 
				class="button btn-submit display-topright">&times;</span>
				<h2 style=" color:#fff">Graph Representation</h2>
			</header>
			<div class="container" style="color:black; margin-left: 10px; margin-right: 10px">
			<?php
				$total = 'SELECT count(`complaint_no`) FROM `Grievances`';
				$res_total = $connect->query($total);
				$tot = $res_total->fetch_assoc();
				$bar = 'SELECT `subject`, count(`complaint_no`) FROM `Grievances` GROUP BY `subject`;';
				$output = $connect->query($bar);
				while($len = $output->fetch_assoc())
				{
					$subject = 'SELECT `Subject_name` FROM `Category_Gri` WHERE `ID`='.$len["subject"].';';
					$res_subject = $connect->query($subject);
					$sub = $res_subject->fetch_assoc();
					$length = round($len["count(`complaint_no`)"]/$tot["count(`complaint_no`)"]*100);
					echo '<p>'.$sub['Subject_name'].': <div style="color:#000!important;background-color:#d1d1d1!important">
	<div style="color:#fff!important;background-color:#4CAF50!important;height:24px;width:'.$length.'%">'.$length.'%</div>
	</div><br></p>';
				}
			?>
			</div>
		</div>
	</div>
</BODY>
</HTML>

