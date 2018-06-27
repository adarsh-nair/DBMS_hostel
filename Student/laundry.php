<?php
	session_start();
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_SESSION["id"];
		$type = $_POST["type"];
		$q = $_POST["q"];
		$c = 0;
		for($i = 0; $i<count($type); $i++)
		{
			$price = 'SELECT `Price` FROM `Laundry` WHERE `ID` = '.$type[$i].';';
			$res_price = $connect->query($price);
			$amt = $res_price->fetch_assoc();
			$insert = 'INSERT INTO `Clothes`(`Hostelite_ID`, `Cloth_ID`, `Quantity`, `Date`, `Total`) VALUES('.$id.','.$type[$i].','.$q[$type[$i]-1].',\''.Date("Y-m-d").'\','.$amt["Price"]*$q[$type[$i]-1].')';
			if($connect->query($insert))
				$c = $c + 1;
		}
		if($c == count($type))
			echo '<script>window.alert("Record(s) inserted!!")</script>';
		else
			echo '<script>window.alert("Record(s) not inserted")</script>';
		echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
	}
?>
