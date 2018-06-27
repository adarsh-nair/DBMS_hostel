<?php
session_start();
require_once('../connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = $_SESSION["id"];
	$date = test_input($_POST["date"]);
	$time = test_input($_POST["time"]);
	$verify = 'SELECT COUNT(`ID`) FROM `Cleaning` WHERE `Hostelite_ID` = '.$id.' AND `Date`=\''.$date.'\';';
	$output = $connect->query($verify);
	$row = $output->fetch_assoc();
	$emp_count = 'SELECT `Employee_ID`, COUNT(`ID`) FROM `Cleaning` WHERE `Time`=\''.$time.'\' AND `Date`=\''.$date.'\'GROUP BY `Employee_ID`';
	$output = $connect->query($emp_count);
	if($output->fetch_assoc() == TRUE)
	{
	while($row_cnt = $output->fetch_assoc())
	{
		if($row_cnt["COUNT(`ID`)"] < 5)
		{
			$e_id = $row_cnt["Employee_ID"];
			break;
		}
	}
	}
	else
	{
		$emp = 'SELECT `Employee_ID` FROM `Housekeeping` WHERE `Time_slot`=\''.$time.'\' LIMIT 1;';
		$output=$connect->query($emp);
		while($emp_id = $output->fetch_assoc())
		{
			$e_id = $emp_id["Employee_ID"];
			break;
		}
	}
	$insert = 'INSERT INTO `Cleaning`(`Hostelite_ID`, `Employee_ID`, `Date`, `Time`) VALUES ('.$id.','.$e_id.',\''.$date.'\',\''.$time.'\');';
		if ($connect->query($insert) === TRUE) 
			{
	?>
		<script>
			window.alert("New record created in Cleaning successfully");
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
	$connect->close();
}
?>
