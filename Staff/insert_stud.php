<?php
	session_start();
	require_once('../connect.php');
	require_once('../staff.php');
	require_once('send_mail.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$name = test_input($_POST["name"]);
		$eid = test_input($_POST["eid"]);
		$fetch_id =  'SELECT MAX(Hostelite_ID) FROM `Hostelite`;';
		echo $fetch_id;
		$res_fetch = $connect->query($fetch_id);
		$res_id = $res_fetch->fetch_assoc();
		$id = $res_id["MAX(Hostelite_ID)"]+1;
		$insert = 'INSERT INTO `Buffer`(`Hostelite_ID`, `Name`, `Email_ID`) VALUES('.$id.',\''.$name.'\',\''.$eid.'\');';
		$connect->query($insert);
		send($eid,$name,$id);
		echo '<script>window.document.location.href=\'/Hostel/staff_first.php\'</script>';
	}
?>
