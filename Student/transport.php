<!DOCTYPE html>
<?php
		session_start();
	require_once('../connect.php');
	$date = $_POST["dat"];
	$id = $_SESSION["id"];
	$c_date = Date("Y-m-d");
	if($date < $c_date)
		echo '<script>window.alert(\'Please check the date!\')</script>';
	else
	{
		$select='SELECT count(T_date) FROM `Transportation` WHERE `T_date`=\''.$date.'\';';
		$result1=$connect->query($select);
		$row1 = $result1->fetch_assoc();
		$cnt=$row1["count(T_date)"];
		$cnt1=$cnt;
		$cnt=$cnt +1;
		$num_plate='SELECT number_plate FROM Vehicle WHERE Sr_no=\''.$cnt.'\';';
		$result=$connect->query($num_plate);
		$row = $result->fetch_assoc();
		$no_plate=$row["number_plate"];
		if($cnt1 <= 5)
		{
			$insert = 'INSERT INTO `Transportation`(`Hostelite_ID`, `number_plate`, `kilometer`, `T_date`) VALUES('.$id.',\''.$no_plate.'\',0,\''.$date.'\');';
			if($connect->query($insert))
			 	echo '<script>window.alert("Your Vehicle has been booked successfully!\n The vehicle number is '.$row["number_plate"].'");</script>';
		}
		else 
			echo '<script>window.alert("Sorry! there are no vehicles available currently!:( ");</script>';
	}
	echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
?>

