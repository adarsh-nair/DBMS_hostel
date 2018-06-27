<?php
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$name = test_input($_POST['name']);	
		$date = Date("Y-m-d");
		$contact = test_input($_POST['contact']);
		$email = test_input($_POST['email']);
		$comment = test_input($_POST['comment']);
		$insert = 'INSERT INTO `Enquiry`(`Date`, `Name`, `Contact`, `Email_ID`, `Comment`) VALUES(\''.$date.'\',\''.$name.'\','.$contact.',\''.$email.'\',\''.$comment.'\');';
		if($connect->query($insert))
			echo '<script>window.alert(\'We\'ll get back to you soon!!\')</script>';
		else
			echo '<script>window.alert(\'Sorry, somnething wrong happened\')</script>';
		echo '<script>window.document.location.href=/Hostel/auto.php<script>';
	}
?>
