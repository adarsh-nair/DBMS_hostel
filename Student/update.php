<?php
	session_start();
	require_once('../connect.php');
	require_once('../student.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")	
	{
		$id  = $_SESSION['id'];
		$c1 = $_POST["c1"];
		$c2 = $_POST["c2"];
		$c3 = $_POST["c3"];
		$c4 = $_POST["c4"];
		$card = $c1."-".$c2."-".$c3."-".$c4;
		$mth = $_POST["mth"];
		$year =$_POST["year"];
		$cvv = $_POST["cvv"];
		$pass = $_POST["pass"];
		$select = 'SELECT * FROM `Payment` WHERE `Hostelite_ID`='.$id.';';
		$res = $connect->query($select);
		if($res->num_row)
		{
			$update = 'UPDATE `Payment` SET `Hostelite_ID`='.$id.', `Card_Number`=\''.$card.'\', `E_Month`='.$mth.', `E_Year` ='.$year.', `CVV`=\''.$cvv.'\', `Password`=\''.$pass.'\' WHERE `Hostelite_ID`='.$id.';';
			$connect->query($update);
			if($connect->query($insert))
				echo '<script>window.alert(\'Card updated successfully!!\')</script>';
			else
				echo '<script>window.alert(\'Card not updated\')</script>';
		}
		else
		{
			$insert = 'INSERT INTO `Payment`(`Hostelite_ID`, `Card_Number`, `E_Month`, `E_Year`, `CVV`, `Password`) VALUES('.$id.',\''.$card.'\','.$mth.','.$year.',\''.$cvv.'\',\''.$pass.'\');';
			echo $insert;
			if($connect->query($insert))
				echo '<script>window.alert(\'Card inserted successfully!!\')</script>';
			else
				echo '<script>window.alert(\'Card not inserted\')</script>';
		}
	}
?>
