<!DOCTYPE html>
<?php
	session_start();
	require_once('../connect.php');
  if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$id = $_POST["id"];
		$dist = $_POST["kilometer"];
		for($x = 0; $x < count($id); $x++)
		$update = 'UPDATE `Transportation` SET kilometer='.$dist[$x].' where Trans_id='.$id[$x].' ;'; 
		if($connect->query($update))
		{
?>
			<script>
			window.alert("The records have been updated");
			</script> 
<?php
		}
	}		      
?>		
