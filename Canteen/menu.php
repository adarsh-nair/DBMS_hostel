<?php
	require_once('../connect.php');
	require_once('../canteen.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$date = Date("Y-m-d");
		$l1 = test_input($_POST["l1"]);
		$l2 = test_input($_POST["l2"]);
		$l3 = test_input($_POST["l3"]);
		$d1 = test_input($_POST["d1"]);
		$d2 = test_input($_POST["d2"]);
		$d3 = test_input($_POST["d3"]);

		$insert = 'INSERT INTO `Menu` VALUES(\''.$date.'\',\''.$l1.'\',\''.$l2.'\',\''.$l3.'\',\''.$d1.'\',\''.$d2.'\',\''.$d3.'\');';

		if($connect->query($insert))
			echo '<script>window.alert(\'Tomorrow\'s Menu has been updated\')</script>';
		else
			echo '<script>window.alert(\'The menu has not been updated\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/canteen_first.php\'</script>';
	}
?>
