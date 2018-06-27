<?php
session_start();
require_once('../connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$food_c = $_POST["food_c"];
	$i = 0;
	$cnt = count($food_c);
	$c = 0;
	while($i<$cnt)
	{
		$update ='UPDATE `Food_Bill` SET `payment` = 1 WHERE `Hostelite_ID`='.$food_c[$i].';';
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
