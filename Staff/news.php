<?php
session_start();
require_once('../connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$date = test_input($_POST["date"]);
	$msg = test_input($_POST["msg"]);
	$insert = 'INSERT INTO `News`(`n_date`, `msg`) VALUES (\''.$date.'\',\''.$msg.'\');';
	if($connect->query($insert) == TRUE)
		echo '<script>window.alert("New Record successfully created");</script>';
	else
		echo '<script>window.alert("New Record couldn\'t be created");</script>';
}
$connect->close();
?>
