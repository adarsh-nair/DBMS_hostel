<?php
	session_start();
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_SESSION["id"];
		$defect = $_POST['defect'];
		$i=0;
		$c = 0;
		$cnt = count($defect);
		$select = 'SELECT `Room_No` FROM `Hostelite` WHERE `Hostelite_ID` = '.$id.';';
		$output = $connect->query($select);
		$room = $output->fetch_assoc();
		while($i<$cnt)
		{
			$update = 'UPDATE `Room` SET `'.$defect[$i].'` = \'Y\' WHERE `Room_No` = '.$room['Room_No'].';';
		if($connect->query($update))
			$c = $c+1;
		$i = $i+1;
		}
		if($c == $cnt)
		{
			$date = Date("Y-m-d");
			$update_date = 'UPDATE `Room` SET `Date_def`=\''.$date'\' WHERE `Room_No` = '.$room['Room_No'].';';
			$connect->query($update_date);
			echo '<script>window.alert("Complaint Accepted!")</script>';
			echo '<script>window.document.location.href=\'/Hostel/student_first.php\'</script>';
	else
		echo '<script>window.alert("Records not update")</script>';
}
?>
