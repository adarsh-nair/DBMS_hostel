<?php
	session_start();
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$plate = test_input($_POST['plate']);
		$model = test_input($_POST['model']);
		$select = 'SELECT Sr_no FROM `Vehicle`';
		$result = $connect->query($select);
		$id = $result->num_rows;
		$id = $id + 1;
		$insert = 'INSERT INTO `Vehicle` VALUES('.$id.',\''.$plate.'\',\''.$model.'\');';
		if($connect->query($insert))
			echo '<script>window.alert(\'Record inserted\')</script>';
		else
			echo '<script>window.alert(\'Record not inserted\')</script>';
		echo '<script>window.document.location.href="/Hostel/staff_first.php"</script>';
	}
?>
