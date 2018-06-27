<?php
	session_start();
	require_once('../connect.php');
	if($_SERVER["REQUEST_POST"] == "POST")
	{
		$solved = $_POST["solved"];
		$defect = $_SESSION["defect"];
		$cnt = 0;
		for($i = 0; $i<count($solved); $i = $i + 1)
		{
			if($defect == 'All')
				$update = 'UPDATE `Room` SET `Win_doors` = \'N\', `Furniture` = \'N\', `Bed`=\'N\', `Water` = \'N\', `Electricity` = \'N\' WHERE `Room_No` = '.$solved[$i].';';
			elseif($defect == 'Carpenter')
				$update = 'UPDATE `Room` SET `Win_doors` = \'N\', `Furniture` = \'N\', `Bed`=\'N\' WHERE `Room_No` = '.$solved[$i].';';
			elseif($defect == 'Plumber')
				$update = 'UPDATE `Room` SET `Water` = \'N\' WHERE `Room_No` = '.$solved[$i].';';
			else
				$update = 'UPDATE `Room` SET `Electricity` = \'N\' WHERE `Room_No` = '.$solved[$i].';';
			if($connect->query($update))
				$cnt = $cnt + 1;
		}
		if($cnt == count($solved))
			echo '<script>window.alert(\'Rooms have been update\')</script>';
		else
			echo '<script>window.alert(\'Rooms have not been update\')</script>';
		echo '<script>window.document.location.href=\'/Hostel/Warden/room.php\'</script>';	
	}
?>
