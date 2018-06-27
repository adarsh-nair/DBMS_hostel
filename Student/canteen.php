<!DOCTYPE html>
<?php
	require_once("../connect.php");
	session_start();

	$id=$_SESSION['id'];
	$Lunch = $_POST["Lunch"];
	$Dinner = $_POST["Dinner"];
	$date=Date("Y-m-d");
	$c_time = '10:00:00';
	date_default_timezone_set('Asia/Kolkata');
	$time  = date("h:i:s");
	if($time < $c_time)
			echo '<script>window.alert(\'Time has already passed for booking lunch and dinner!!\')</script>';
	else
	{
		$check = 'SELECT `id`, `food_type` FROM `Food` WHERE `Hostelite_ID` = '.$id.' AND `date`=\''.$date.'\';';
		$res_check = $connect->query($check);
		$fetch = $res_check->fetch_assoc();
		$cnt = $fetch->num_rows;
		if($cnt == 0 || $cnt == 1)
		{
			if($Lunch==1 && ($cnt == 0 || $fetch['food_type'] == 2))
			{
				$add_lunch='INSERT INTO `Food`(`Hostelite_ID`,`food_type`,`date`) VALUES ('.$id.',1,\''.$date.'\');';
				$connect->query($add_lunch);
			}
			if($Dinner==1 && ($cnt == 0 || $fetch['food_type'] == 1))
			{
			 $add_dinner='INSERT INTO `Food`(`Hostelite_ID`,`food_type`,`date`) VALUES ('.$id.',2,\''.$date.'\');';
				$connect->query($add_dinner);
			}

		 if($Lunch==1 || $Dinner==1 )
			{
		?>
			<script>
				window.alert("Bon Appetite!!");
				window.document.location.href='/Hostel/student_first.php';
			</script> 
		<?php
			}
			else
				echo '<script>window.alert("Meal not record")</script>';
			echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
		}
		else
			echo '<script>window.alert(\'Meal already booked!!\')</script>';
	}
	echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
?>



