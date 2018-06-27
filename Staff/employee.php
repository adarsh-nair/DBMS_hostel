<?php
	session_start();
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$name = test_input($_POST['name']);
		$contact = test_input($_POST['contact']);
		$time = $_POST['time'];
		$select = 'SELECT `Employee_ID` FROM `Housekeeping`';
		$result = $connect->query($select);
		$id = $result->num_rows;
		$id = $id + 1;
		$insert = 'INSERT INTO `Housekeeping` VALUES('.$id.',\''.$name.'\','.$contact.',\''.$time.'\');';
		if($connect->query($insert))
			echo '<script>window.alert(\'Record inserted\')</script>';
		else
			echo '<script>window.alert(\'Record not inserted\')</script>';
		echo '<script>window.document.location.href="/Hostel/staff_first.php"</script>';
	}
?>
