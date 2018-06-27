<!DOCTYPE html>
<HTML>
<BODY>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../staff.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$sd = test_input($_POST['start']);
		$ed = test_input($_POST['end']);
		$select = 'SELECT * FROM `Enquiry` WHERE Date >=\''.$sd.'\' AND DATE <=\''.$ed.'\';';
		$result = $connect->query($select);
		echo '<table id="t01" style="margin-top: 50px; max-width: 500px; margin-left:150px;">';		
		echo '<tr>';
			echo '<th>Sr No.</th>';
			echo '<th>Date</th>';
			echo '<th>Name</th>';
			echo '<th>Contact</th>';
			echo '<th>Email ID</th>';
			echo '<th>Comment</th>';
		echo '</tr>';
    $i = 1;
	  while($fetch = $result->fetch_assoc()) 
		{	   
			echo "<tr>";
				echo "<td>".$i."</td>";
			  echo "<td>".$row["Date"]."</td>";
				echo "<td>".$row["Name"]."</td>";		
				echo "<td>".$row["Contact"]."</td>";		
				echo "<td>".$row["Email_ID"]."</td>";		
				echo "<td>".$row["Comment"]."</td>";		
			echo "</tr>";
			$i = $i + 1;
		}						
	}
?>
</BODY>
</HTML>
