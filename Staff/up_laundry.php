<?php
session_start();
require_once('../connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$laundry_c = $_POST["laundry_c"];
	$i = 0;
	$cnt = count($laundry_c);
	$c = 0;
	while($i<$cnt)
	{
		$update ='UPDATE `Laundry_Bill` SET `Payment` = 1 WHERE `Hostelite_ID`='.$laundry_c[$i].';';
		echo $update;
		if($connect->query($update))
			$c = $c+1;
		$i = $i+1;
	}
	if($c == $cnt)
		{
?>
	<script>
		var r = confirm("Record(s) updated");
    if (r == true) {
        window.document.location.href='bill_staff.php';
    } else {
        window.document.location.href='bill_staff.php';
    }
	</script>
<?php
	}
	else
		echo '<script>window.alert("Records not update")</script>';
}
?>
