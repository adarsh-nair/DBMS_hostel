<?php
	session_start();
	require_once('../connect.php');
	require_once('../essentials.php');
	$date = '2017-07-19';
	//$date = Date("Y-m-d");
	$today = 'SELECT c.Category, `Item_name`, SUM(Quantity), Unit FROM `Category_Items` as c, `Items` as i, `Essentials` as e WHERE c.`Sr_No` = i.`Category` AND e.`Date` = \''.$date.'\' AND e.`Sr_No` = i.`Sr_No` GROUP BY `Item_name`;';
 	$res = $connect->query($today);
	echo '</div></div>';
	echo '<button onclick="window.document.location.href=\'list_pdf.php\'" class="bar-item button" style="margin-left:900px;width: 180px; background-color:#333;">Generate PDF</button>';
	if($res->num_rows)
	{
		echo '<table id="t01" style="margin-left: 320px; margin-top: 50px; max-width: 500px;">';
			echo '<tr>';
				echo '<th>Sr No.</th>';
				echo '<th>Category</th>';
				echo '<th>Item name</th>';
				echo '<th>Quantity</th> ';
				echo '<th>Unit</th>';
			echo '</tr>';
		$i = 1;
		while($out = $res->fetch_assoc())
		{
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$out["Category"].'</td>';
			echo '<td>'.$out["Item_name"].'</td>';
			echo '<td>'.$out["SUM(Quantity)"].'</td>';
			echo '<td>'.$out["Unit"].'</td>';
			echo '</tr>';
			$i = $i + 1;
		}
	}
	else
	{
		echo '<script>window.alert(\'No entries to display\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/essential_first.php\'</script>';
	}
?>

