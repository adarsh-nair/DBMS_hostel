<!DOCTYPE html>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../staff.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$date = test_input($_POST["date"]);
	$select = 'SELECT `Hostelite_ID`, `Item_name`, `Quantity` FROM `Essentials` as e, `Items` as i WHERE e.Sr_No = i.Sr_No and `Date` = \''.$date.'\';';
	$out_s = $connect->query($select);
	echo '</div></div>';
		echo '<table id="t01" style="margin-top: 50px; max-width: 500px;margin-left:320px;">';
			echo '<tr>';
			echo '<th>Sr No.</th>';
			echo '<th>Hostelite ID</th>';
			echo '<th>Item Name</th>';
			echo '<th>Quantity</th> ';
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
				echo "<td>".$row["Item_name"]."</td>";
				echo "<td>".$row["Quantity"]."</td>";
			echo "</tr>";
			$i = $i + 1;
		}
		echo '</table>';
}
?>
</BODY>
</HTML>

