<!DOCTYPE html>
<?php
	require_once('../connect.php');
  if($_SERVER["REQUEST_METHOD"] == "POST")
	{
 		$id = $_POST["id"];
		$c = 0;
		$today = Date('Y-m-d');
		for($x = 0; $x < count($id); $x++)
		{
			$update = "UPDATE `Grievances` SET Addressed= 'Y' where complaint_no =".$id[$x].";"; 
			$select = 'SELECT `Hostelite_ID`, `date` FROM `Grievances` WHERE complaint_no ='.$id[$x].';'; 
			$res_select = $connect->query($select);
			$fetch_select = $res_select->fetch_assoc();
			$msg = 'Your issue dated '.$fetch_select['date'].' has been addressed';
			$insert = 'INSERT INTO `Message_stud`(`Hostelite_ID`, `Sender`, `Date`, `Msg`) VALUES ('.$fetch_select['Hostelite_ID'].',\'Warden\',\''.$today.'\',\''.$msg.'\')';
		if($connect->query($update) && $connect->query($insert))
			$c = $c + 1;
		}
		if($c == count($id))
					echo '<script>window.alert("Sucessfully saved");</script>';
		echo '<script>window.document.location.href=\'grievances.php\'</script>';
	}     
?>		
