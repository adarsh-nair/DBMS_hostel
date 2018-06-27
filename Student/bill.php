<!DOCTYPE html>
<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../student.php');
	echo '</div></div>';
	echo '<button onclick="window.document.location.href=\'detailed.php\'" class="bar-item button" style="margin-left:800px; width: 180px; background-color:#333;">Detailed Bill</button><br><br>';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_SESSION["id"];
		$mth = test_input($_POST["mth"]);
		$_SESSION["mth"] = $mth;
		$food = 'SELECT `Total_count`, `Amount`, `Month`, `payment` FROM `Food_Bill` WHERE `Hostelite_ID`='.$id.' AND `Month` = \''.$mth.'\';';
		$out_f = $connect->query($food);
		if(!$out_f->num_rows)
			echo '<h3><center>Food bill is currently unavailable. To view your details click on the detailed bill button</center></h3>';
			echo '<center>';
			echo '<table id="t01" style="margin-top: 70px; max-width: 500px;">';
				echo '<tr>';
					echo '<th>Sr No.</th>';
					echo '<th>Bill Type</th>';
					echo '<th>Total</th>';
					echo '<th>Amount</th> ';
					echo '<th>Payment status</th>';
				echo '</tr>';
			$i = 1;
		$rowf = $out_f->fetch_assoc();
				echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>Food Bill</td>";
					echo "<td>".$rowf["Total_count"]."</td>";
					echo "<td>".$rowf["Amount"]."</td>";
					if($rowf["payment"] == 1)
						echo "<td>Paid</td>";
					else if($rowf["payment"] == 0)
						echo "<td>Unpaid</td>";
				echo "</tr>";
				$i = $i + 1;
		$laundry = 'SELECT `Total`, `Amount`, `Month`, `Payment` FROM `Laundry_Bill` WHERE `Hostelite_ID`='.$id.' AND `Month` = \''.$mth.'\';';
		$out_l = $connect->query($laundry);
		$rowl = $out_l->fetch_assoc();
		if(!$out_f->num_rows)
			echo '<h3><center>Laundry bill is currently unavailable. To view your details click on the detailed bill button</center></h3>';
				echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>Laundry Bill</td>";
					echo "<td>".$rowl["Total"]."</td>";
					echo "<td>".$rowl["Amount"]."</td>";
					if($rowl["Payment"] == 1)
						echo "<td>Paid</td>";
					else if($rowl["Payment"] == 0)
						echo "<td>Unpaid</td>";
				echo "</tr>";
		$i = $i + 1;
				echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>Total</td>";
					echo "<td>--</td>";
		$total = $rowf["Amount"]+$rowl["Amount"];
					echo "<td>".$total."</td>";
					echo "<td>--</td>";
				echo "</tr>";
			echo '</table>';
		echo '</center>';
	}
?>
</BODY>
</HTML>

