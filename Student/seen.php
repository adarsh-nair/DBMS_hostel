<?php
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$seen = $_POST["seen"];
		$date = Date("Y-m-d");
		$cnt = 0;
		for($i = 0; $i < count($seen); $i = $i + 1)
		{
			$update = 'UPDATE `Message_stud` SET `Seen` = \''.$date.'\' WHERE `Sr_No` = '.$seen[$i].';';
			if($connect->query($update))
				$cnt = $cnt + 1;
		}
		if($cnt == count($seen))
			echo '<script>window.alert(\'Message(s) marked as seen\')</script>';
		else
			echo '<script>window.alert(\'Messages not update :( \')</script>';
		echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
	}
?>
