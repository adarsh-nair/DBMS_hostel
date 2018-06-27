<?php
	session_start();	
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_SESSION['id'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$name = test_input($_POST['name']);
		$rel = test_input($_POST['rel']);
		$con = test_input($_POST['con']);
		$reason = test_input($_POST['reason']);
		$insert = 'INSERT INTO `Night_Out`(`Hostelite_ID`, `Date_start`, `Date_end`, `Reason`, `Gaurdian_Name`, `G_Relation`,`G_Contact`) VALUES('.$id.',\''.$start.'\',\''.$end.'\',\''.$reason.'\',\''.$name.'\',\''.$rel.'\',\''.$con.'\')';
		$select = 'SELECT * FROM `Night_Out` WHERE `Hostelite_ID`='.$id.' AND `Date_start` = \''.$start.'\';';
		$res_select = $connect->query($select);
		if(!$res_select->num_rows)
		{
			if($connect->query($insert))
				echo '<script>window.alert(\'Request Submitted.\')</script>';
			else
				echo '<script>window.alert(\'Request not submitted.\')</script>';
		}
		else
			echo '<script>window.alert(\'Looks like you already have plans for that day!\')</script>';			
		echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
	}
?>
