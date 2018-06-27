<?php
	require_once('../connect.php');
	require_once('../housekeeping.php');
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$c = 0;
		$date = Date("Y-m-d");
		$item = $_POST["item"];
		$quant = $_POST["quant"];
		$price = $_POST["price"];
		for($i = 0; $i < count($item); $i = $i + 1)
		{
			$insert = 'INSERT INTO `Cleaning_Items`(`Item`, `Quantity`, `Price`, `Date`) VALUES ('.$item[$i].','.$quant[$i].','.$price[$i].'\''.$date.'\');';
			if($connect->query($insert))
				$c = $c + 1;
		}
		if($c == count($item))
			echo '<script>window.alert("Sucessfully updated into inventory")</script>';
		echo '<script>window.document.location.href=\'/Hostel/housekeeping_first.php\'</script>';
	}
?>		
