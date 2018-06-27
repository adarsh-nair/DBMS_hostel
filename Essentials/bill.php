<!DOCTYPE html>
<?php
	session_start();
	require_once('../connect.php');
	require_once('../essentials.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		echo '</div></div>';
		$id = $_POST['id'];
		$del = $_POST['del'];
		if($del)
		{
			$date = Date("Y-m-d");
			$name_room = 'SELECT `Name`, `Room_No`, `Contact` FROM `Hostelite` WHERE `Hostelite_ID`='.$id.';';
			$res_rn = $connect->query($name_room);
			$fetch = $res_rn->fetch_assoc();
			echo '<h3 style="margin-left: 320px;">';
			echo "Name: ".$fetch["Name"]."<br><br>";
			echo "Room No: ".$fetch["Room_No"]."<br> <br>";
			echo "Contact: ".$fetch["Contact"]."<br>";
			echo "</h3>";
			$print = 'SELECT `Item_name`, `Quantity` FROM `Items` WHERE `Sr_No`= (SELECT `Sr_No` FROM `Essentials` WHERE `Hostelite_ID` = '.$id.' AND Date=\''.$date.'\')';
			$res = $connect->query($print);
			echo '<table id="t01" style="margin-left: 320px; margin-top: 10px; max-width: 500px;">';
				echo '<tr>';
					echo '<th>Sr No.</th>';
					echo '<th>Item</th>';
					echo '<th>Quantity</th> ';
				echo '</tr>';
			$i = 1;
			while($out = $res->fetch_assoc())
			{
				echo '<tr>';
				echo '<td>'.$i.'</td>';
				echo '<td>'.$out["Item_name"].'</td>';
				echo '<td>'.$out["Quantity"].'</td>';
				echo '</tr>';
				$i = $i + 1;
			}
		}
	}
?>
