<?php
session_start();
require_once('../connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = $_SESSION["id"];
	$date = date("Y-m-d");
	$subject = test_input($_POST["subject"]);
	$msg = test_input($_POST["msg"]);
	$insert ='INSERT INTO `Grievances`(`Hostelite_ID`,`date`,`complaint`,`subject`) VALUES('.$id.',\''.$date.'\',\''.$msg.'\','.$subject.');';
	if($connect->query($insert) == TRUE)
	{
		echo '<script>window.alert("New Record successfully created");</script>';
		echo '<script>window.document.location.href = \'/Hostel/student_first.php\'</script>';
	}
	else
		echo '<script>window.alert("New Record couldn\'t be created");</script>';
}
?>
