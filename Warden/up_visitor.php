<?php
	session_start();	
	require_once('../connect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_POST["id"];
		$room = $_POST["room"];
		$time = $_POST["time"];
		$c = 0;
		for($i = 0; $i < count($room); $i = $i + 1)
		{
			if($time[$i] != "00:00")
			{
				$update = 'UPDATE `Visitor` SET `Time_OUT`=\''.$time[$i].'\' WHERE `ID`='.$id[$i].';';
				$update_room = 'UPDATE `Room` SET `Occupied`=\'N\' WHERE `Room_No`='.$room[$i].';';
				if($connect->query($update) && $connect->query($update_room))
				{
					$c = $c + 1;
					$select = 'SELECT * FROM `Visitor_Queue`';
					$res_select = $connect->query($select);
					if($res_select->num_rows)
					{
						while($fetch_select=$res_select->fetch_assoc())
						{	
							echo 'Here!!';
							echo $room[$i];
							$insert = 'INSERT INTO `Visitor`(`Hostelite_ID`, `Room_No`, `Name`, `Relation`, `Contact`, `Date_of_Visit`, `Time_IN`, `Date_of_Departure`) VALUES('.$fetch_select["Hostelite_ID"].','.$room[$i].',\''.$fetch_select["Name"].'\',\''.$fetch_select["Relation"].'\','.$fetch_select["Contact"].',\''.$fetch_select["Date_of_Visit"].'\',\''.$fetch_select["Time_IN"].'\',\''.$fetch_select["Date_of_Departure"].'\')';
							echo $insert;
							$up_room = 'UPDATE `Room` SET `Occupied`=\'Y\' WHERE `Room_No`='.$room[$i].';';
							$connect->query($up_room);
							if($connect->query($insert))
							{
								$delete = 'DELETE FROM `Visitor_Queue` WHERE `ID`='.$fetch_select["ID"].';';
								echo $delete;
								if($connect->query($delete))
								{
									$date = Date("Y-m-d");
									$msg = 'INSERT INTO `Message_stud`(`Hostelite_ID`,`Sender`, `Date`, `Msg`) VALUES ('.$fetch_select["Hostelite_ID"].',\'Warden\',\''.$date.'\',\'Your request for visitor\'s room dated \''.$fetch_select["Date_of_Request"].'\' has been granted.\')';
									$connect->query($msg);
								}
							}
						}
					}
				}
			}
		}
		echo '<script>window.alert(\''.$c.' records updated!\')</script>';
//		echo '<script>window.document.location.href=\'/Hostel/Warden/visitor.php\'</script>';
	}
?>
