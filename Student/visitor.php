<?php
session_start();
require_once('../connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = $_SESSION["id"];
	$nm = test_input($_POST["nm"]);
	$rel = test_input($_POST["rel"]);
	$dv = test_input($_POST["dv"]);
	$dd = test_input($_POST["dd"]);
	$con = test_input($_POST["con"]);
	$tc = test_input($_POST["tc"]);
	if(strnatcmp($dv, $dd) != 0)
	{	
		$input = "SELECT `Room_No` FROM `Room` WHERE `Room_No` LIKE '7%' AND `Occupied` != 'Y' LIMIT 1;";
		$output = $connect->query($input);
		$room = $output->fetch_assoc();
		if($output->num_rows)
		{
			$rn = $room["Room_No"];
			$verify = 'SELECT count(ID), `Room_No` FROM `Visitor` WHERE `Hostelite_ID` = '.$id.' AND `Date_of_Visit` = \''.$dv.'\';';
			$v_output = $connect->query($verify);
			if($v_output->num_rows != 0)
			{
				$room = $v_output->fetch_assoc();
				$rn1 = $room["Room_No"];
			}
			if($rn1 != NULL)
				$rn = $rn1;
			$date = date("Y-m-d");
			if($dv < $date)
			{
				$flag = 0;
				echo '<script>window.alert("Date of visit is incorrect")</script>';		
				echo '<script>window.document.location.href =\'/Hostel/student_first.php\';</script>';	
			}
			if($dd < $dv)
			{
				$flag = 0;			
				echo '<script>window.alert("Date of departure is incorrect")</script>';			
				echo '<script>window.document.location.href =\'/Hostel/student_first.php\';</script>';	
			}
			else
			{		
				$insert = 'INSERT INTO `Visitor`(`Hostelite_ID`, `Room_No` , `Name`, `Relation`, `Contact`, `Date_of_Visit`, `Time_IN`, `Date_of_Departure`) VALUES('.$id.','.$rn.',"'.$nm.'","'.$rel.'",'.$con.',\''.$dv.'\',\''.$tc.'\',\''.$dd.'\');';
				if ($connect->query($insert) === TRUE) 
				{
			echo '<script>window.alert("You have been allotted Room No: '.$rn.'");</script>';
				$update = 'UPDATE `Room` SET `Occupied` = \'Y\' WHERE `Room_No` = '.$rn.';';
				$connect->query($update);
				echo '<script>window.document.location.href =\'/Hostel/student_first.php\';</script>';
				}
				else 
				{
		?>
			<script>
					window.alert("Record not created");
					window.document.location.href = '/Hostel/student_first.php';
			</script>
		<?php
				}
			}
		}
		else
		{ 
			$check = 'SELECT * FROM `Visitor_Queue` WHERE `Hostelite_ID` ='.$id.' AND Name=\''.$nm.'\' AND Date_of_Visit=\''.$dv.'\';';
			$res_check = $connect->query($check);
			if(!$res_check->num_rows)
			{
				$dr = Date('Y-m-d');
				$queue = 'CALL Queue('.$id.',"'.$nm.'","'.$rel.'","'.$con.'",\''.$dv.'\',\''.$tc.'\',\''.$dd.'\',\''.$dr.'\')';
				if($connect->query($queue))
					echo '<script>window.alert(\'Sorry No room available currently. Your request has been saved and shall be granted as per avaialbility.\')</script>';
			}
			echo '<script>window.document.location.href =\'/Hostel/student_first.php\';</script>';
		}
	}
	else
	{
?>
	<script>
		window.alert("Room can't be alloted for less than one night");
		window.document.location.href ='/Hostel/student_first.php';
	</script>
<?php
	}
}
?>
