<?php
session_start();
require_once('../connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = $_SESSION["id"];
	$item = array( array(test_input($_POST["cat1"]),test_input($_POST["i1"]),test_input($_POST["q1"]),test_input($_POST["u1"])),
								 array(test_input($_POST["cat2"]),test_input($_POST["i2"]),test_input($_POST["q2"]),test_input($_POST["u2"])),
								 array(test_input($_POST["cat3"]),test_input($_POST["i3"]),test_input($_POST["q3"]),test_input($_POST["u3"])),
								 array(test_input($_POST["cat4"]),test_input($_POST["i4"]),test_input($_POST["q4"]),test_input($_POST["u4"])),
								 array(test_input($_POST["cat5"]),test_input($_POST["i4"]),test_input($_POST["q5"]),test_input($_POST["u1"])));
	$select = 'SELECT MAX(`Sr_No`) FROM `Essentials`;';
	$result = $connect->query($select);
	$srno = $result->fetch_assoc();
	$n_srno= $srno["MAX(`Sr_No`)"] + 1;
	$date = date("Y-m-d");
	$intoEss = 'INSERT INTO `Essentials`(`Sr_No`,`Hostelite_ID`, `Date`) VALUES ('.$n_srno.','.$id.',\''.$date.'\');';
	if ($connect->query($intoEss) === TRUE) 
	{
	?>
<!DOCTYPE html>
		<script>
			window.alert("New record created in Essentials successfully");
		</script>
	<?php
	}
	else 
	{
	?>
		<script>
		  	window.alert("Record not created");
		</script>
	<?php
	}
	for($i = 0; $i<5; $i++)
	{
		if(strlen($item[$i][0]) != 0)
		{
			if((($item[$i][0] == 3 || $item[$i][0] == 4) && $item[$i][3] == 'kg') || ($item[$i][0] == 5 && $item[$i][3]=='l') || (($item[$i][0] ==  6 || $item[$i][0] ==  7 || $item[$i][0] ==  8 || $item[$i][0] ==  9 || $item[$i][0] ==  1 || $item[$i][0] ==  2)&&$item[$i][3] == '--'))
			{
				$insert = 'INSERT INTO `Items`(`Sr_No`, `Category`, `Item_name`, `Quantity`, `Unit`) VALUES ('.$n_srno.','.$item[$i][0].',"'.$item[$i][1].'",'.$item[$i][2].','.$item[$i][3].');';	
				if ($connect->query($insert) === TRUE) 
				{
	?>
				<script>
					window.alert("New record created successfully");
					window.document.location.href = '/Hostel/student_first.php';
				</script>
	<?php
				}
				else 
				{
		?>
			<script>
					window.alert("Record not created");
				window.document.location.href = '/Hostel/student_first.php';
			</script>
		<?php
				}
			}
			else
			{
				echo '<script>window.alert("Invalid unit entered for '.($i+1).' entry.");</script>';
				echo '<script>window.document.location.href = \'/Hostel/student_first.php\';</script>';
			}
		}
	}
	$connect->close();
}
?>
