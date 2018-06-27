<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../staff.php');
	echo '</div></div>';
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$mth = test_input($_POST["mth"]);
			$dis_type = test_input($_POST["dis_type"]);
			$food = 'SELECT `Hostelite_ID`, `Amount`, `payment` FROM `Food_Bill` WHERE `Month` = \''.$mth.'\';';
			$out_f = $connect->query($food);
			echo '<h2 style="margin-left:240px; padding-left:50px">FOOD BILLS</h2>';
		echo '<table id="t01" style="margin-top: 50px; max-width: 500px;margin-left:320px;">';
					echo '<tr>';
						echo '<th>Sr No.</th>';
						echo '<th>Hostelite ID</th>';
						echo '<th>Amount</th> ';
						echo '<th>Payment</th>';	
					echo '</tr>';
				$i = 1;
				if($dis_type == 'Unpaid')
					echo '<form method="post" action="/Hostel/Staff/up_food.php">';
				while($rowf = $out_f->fetch_assoc()) 
				{
					if($dis_type == 'Paid' && $rowf["payment"]==1)
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$rowf["Hostelite_ID"]."</td>";
							echo "<td>".$rowf["Amount"]."</td>";		
							echo "<td>Paid</td>";
						echo "</tr>";
						$i=$i+1;
					}
					else if($dis_type == 'Unpaid' && $rowf["payment"]==0)
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$rowf["Hostelite_ID"]."</td>";
							echo "<td>".$rowf["Amount"]."</td>";
							echo '<td><input type="checkbox" name="food_c[]" value="'.$rowf["Hostelite_ID"].'"/></td>';
						echo "</tr>";
						$i = $i + 1;
					}
					else if($dis_type=='All')
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$rowf["Hostelite_ID"]."</td>";
							echo "<td>".$rowf["Amount"]."</td>";
						if($rowf["payment"]!=1)			
							echo "<td>Unpaid</td>";
						else
							echo "<td>Paid</td>";
						echo "</tr>";
						$i = $i + 1;
					}
				}
				echo '</table>';
				if($dis_type == 'Unpaid' && $i>1)
					echo '<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px; margin-top:10px">SUBMIT</button></form>';
			$laundry = 'SELECT `Hostelite_ID`, `Amount`, `Payment` FROM `Laundry_Bill` WHERE `Month` = \''.$mth.'\';';
			$out_l = $connect->query($laundry);
			echo '<h2 style="margin-left:240px; padding-left:50px">LAUNDRY BILLS</h2>';
				echo '<table id="t01" style="margin-top: 50px; max-width: 500px;margin-left:320px;">';
					echo '<tr>';
						echo '<th>Sr No.</th>';
						echo '<th>Hostelite ID</th>';
						echo '<th>Amount</th> ';
						echo '<th>Payment</th>';	
					echo '</tr>';
				$i = 1;
				if($dis_type == 'Unpaid')
					echo '<form method="post" action="/Hostel/Staff/up_laundry.php">';
				while($rowl = $out_l->fetch_assoc()) 
				{
					if($dis_type == 'Paid' && $rowl["Payment"]==1)
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$rowl["Hostelite_ID"]."</td>";
							echo "<td>".$rowl["Amount"]."</td>";		
							echo "<td>Paid</td>";
						echo "</tr>";
						$i=$i+1;
					}
					else if($dis_type == 'Unpaid' && $rowl["Payment"]==0)
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$rowl["Hostelite_ID"]."</td>";
							echo "<td>".$rowl["Amount"]."</td>";
							echo '<td><input type="checkbox" name="laundry_c[]" value="'.$rowl["Hostelite_ID"].'"/></td>';
						echo "</tr>";
						$i = $i + 1;
					}
					else if($dis_type=='All')
					{
						echo "<tr>";
							echo "<td>".$i."</td>";
							echo "<td>".$rowl["Hostelite_ID"]."</td>";
							echo "<td>".$rowl["Amount"]."</td>";
						if($rowl["Payment"]!=1)			
							echo "<td>Unpaid</td>";
						else
							echo "<td>Paid</td>";
						echo "</tr>";
						$i = $i + 1;
					}
				}
				echo '</table>';
				if($dis_type == 'Unpaid' && $i>1)
					echo '<button class="btn-submit" type ="submit" style="color:#fff; margin-left: 150px; margin-top:10px">SUBMIT</button></form>';
			$connect->close();
			}
?>
</BODY>
</HTML>

