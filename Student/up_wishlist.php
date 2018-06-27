<?php
	session_start();
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_SESSION['id'];
		$date = Date("Y-m-d");
		$dish = test_input($_POST['dish']);
		$mon = date("Y-m-d",strtotime("last Saturday"));
			if(Date("l") == "Monday")
				$mon = $date;
		$insert = 'INSERT INTO `Wish_list`(`Hostelite_ID`, `Item_name`, `Date`) VALUES('.$id.',\''.$dish.'\',\''.$date.'\');';
		$verify = 'SELECT * FROM `Wish_list` WHERE `Hostelite_ID` ='.$id.' AND Date >= \''.$mon.'\' AND Date <= \''.$date.'\';';
		$res_verify = $connect->query($verify);
		if(!$res_verify->fetch_assoc())
		{
			if($connect->query($insert))
				echo '<script>window.alert(\'Request submited!\')</script>';
			else
				echo '<script>window.alert(\'Request not submited\')</script>';			
		}		
		else
			echo '<script>window.alert(\'You get only 1 wish each week!\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
	}
?>
